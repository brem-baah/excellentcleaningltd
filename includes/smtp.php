<?php
/**
 * Minimal SMTP client (AUTH LOGIN over SSL or STARTTLS). No external libraries.
 * Returns true on success; on failure returns false and puts the server reply in $err.
 */
function smtp_send(array $c, string $to, string $subject, string $body, string $replyTo, string &$err = ''): bool
{
    $secure = $c['secure'] ?? 'ssl';
    $port = (int)($c['port'] ?? 465);
    $ctx = stream_context_create(['ssl' => ['verify_peer' => true, 'verify_peer_name' => true]]);
    $fp = @stream_socket_client(($secure === 'ssl' ? 'ssl://' : 'tcp://') . $c['host'] . ':' . $port, $en, $es, 15, STREAM_CLIENT_CONNECT, $ctx);
    if (!$fp) { $err = "connect failed: $es"; return false; }
    stream_set_timeout($fp, 15);

    $read = function () use ($fp) {
        $r = '';
        while (($l = fgets($fp, 515)) !== false) { $r .= $l; if (strlen($l) < 4 || $l[3] === ' ') break; }
        return $r;
    };
    $expect = function (?string $line, string $code) use ($fp, $read, &$err) {
        if ($line !== null) fwrite($fp, $line . "\r\n");
        $r = $read();
        if (strpos($r, $code) !== 0) { $err = trim($r) ?: 'no reply'; return false; }
        return true;
    };
    $domain = preg_replace('/[^a-z0-9.-]/i', '', $_SERVER['HTTP_HOST'] ?? 'localhost') ?: 'localhost';
    $fail = function () use ($fp) { @fwrite($fp, "QUIT\r\n"); @fclose($fp); return false; };

    if (!$expect(null, '220') || !$expect("EHLO $domain", '250')) return $fail();
    if ($secure === 'tls') {
        if (!$expect('STARTTLS', '220')) return $fail();
        if (!@stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) { $err = 'TLS handshake failed'; return $fail(); }
        if (!$expect("EHLO $domain", '250')) return $fail();
    }
    if (!$expect('AUTH LOGIN', '334') || !$expect(base64_encode($c['user']), '334') || !$expect(base64_encode($c['pass']), '235')) return $fail();

    $from = $c['from'] ?? $c['user'];
    if (!$expect("MAIL FROM:<$from>", '250') || !$expect("RCPT TO:<$to>", '250') || !$expect('DATA', '354')) return $fail();

    $subj = function_exists('mb_encode_mimeheader') ? mb_encode_mimeheader($subject, 'UTF-8') : '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $fromName = preg_replace('/[^A-Za-z0-9 ._-]/', '', $c['from_name'] ?? 'Website');
    $msg = "Date: " . date('r') . "\r\n"
         . "From: $fromName <$from>\r\nTo: <$to>\r\nReply-To: <$replyTo>\r\n"
         . "Subject: $subj\r\nMessage-ID: <" . bin2hex(random_bytes(8)) . "@$domain>\r\n"
         . "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n"
         . chunk_split(base64_encode($body));
    fwrite($fp, $msg . "\r\n.\r\n");
    if (strpos($read(), '250') !== 0) { $err = 'message rejected'; return $fail(); }
    @fwrite($fp, "QUIT\r\n"); @fclose($fp);
    return true;
}
