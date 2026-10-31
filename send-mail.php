<?php
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

$to = 'excellentcleaningltd@yahoo.com';

function out($ok, $msg, $code = 200) {
    http_response_code($code);
    echo json_encode(['ok' => $ok, 'message' => $msg], JSON_UNESCAPED_UNICODE);
    exit;
}

// mbstring is not guaranteed on every host: fall back safely instead of a fatal error.
function cut($s, $n) { return function_exists('mb_substr') ? mb_substr((string)$s, 0, $n) : substr((string)$s, 0, $n); }

// Read-modify-write a JSON file under an exclusive lock (prevents lost or corrupted leads).
function update_json($file, callable $fn) {
    $fh = @fopen($file, 'c+');
    if (!$fh) return false;
    flock($fh, LOCK_EX);
    $raw = stream_get_contents($fh);
    $data = $raw ? (json_decode($raw, true) ?: []) : [];
    $data = $fn($data);
    ftruncate($fh, 0);
    rewind($fh);
    $ok = fwrite($fh, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) !== false;
    fflush($fh);
    flock($fh, LOCK_UN);
    fclose($fh);
    return $ok;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') out(false, 'Invalid request method.', 405);

// Same-origin check (cross-site posting). Browsers always send Origin on cross-site POSTs.
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin !== '' && parse_url($origin, PHP_URL_HOST) !== parse_url('http://' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST)) {
    out(false, 'Request blocked.', 403);
}

// Honeypot: silently succeed so bots do not retry
if (!empty($_POST['website'])) out(true, 'Thank you. We will be in touch shortly.');

$dir = __DIR__ . '/storage';
if (!is_dir($dir)) {
    @mkdir($dir, 0750, true);
    @file_put_contents($dir . '/.htaccess', "Require all denied\nDeny from all\n");
}

// Rate limit: max 5 requests per IP per 10 minutes
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$now = time();
$blocked = false;
update_json($dir . '/rate_limits.json', function ($d) use ($ip, $now, &$blocked) {
    foreach ($d as $k => $ts) {
        $d[$k] = array_values(array_filter($ts, fn($t) => ($now - $t) < 600));
        if (!$d[$k]) unset($d[$k]);
    }
    if (count($d[$ip] ?? []) >= 5) { $blocked = true; return $d; }
    $d[$ip][] = $now;
    return $d;
});
if ($blocked) out(false, 'Too many requests. Please wait a few minutes or reach us directly via WhatsApp or phone.', 429);

$clean = fn($k, $max = 250) => trim(preg_replace('/[\r\n\t]+/', ' ', cut($_POST[$k] ?? '', $max)));
$name = $clean('name', 100);
$email = $clean('email', 150);
$phone = $clean('phone', 35);
$service = $clean('service', 120);
$postcode = $clean('postcode', 30);
$preferredDate = $clean('preferred_date', 100);
$estimatedCost = $clean('estimated_cost', 100);
$details = trim(cut($_POST['details'] ?? '', 4000));

if (!$name || !$phone || !$service || !$postcode || !$details) {
    out(false, 'Please fill in all required fields (Name, Phone, Service, Postcode, and Details).', 422);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) out(false, 'Please provide a valid email address.', 422);
if (strlen(preg_replace('/[^0-9]/', '', $phone)) < 7) out(false, 'Please provide a valid phone number.', 422);

// 1) Store the lead first so no enquiry is ever lost
$saved = update_json($dir . '/leads.json', function ($d) use ($name, $email, $phone, $service, $postcode, $preferredDate, $estimatedCost, $details, $ip) {
    $d[] = ['timestamp' => date('c'), 'name' => $name, 'email' => $email, 'phone' => $phone, 'service' => $service,
            'postcode' => $postcode, 'preferred_date' => $preferredDate, 'estimated_cost' => $estimatedCost, 'details' => $details, 'ip' => $ip];
    return $d;
});

// 2) Email the owner
$subjectRaw = "New Quote Request: $service - $postcode ($name)";
$subject = function_exists('mb_encode_mimeheader') ? mb_encode_mimeheader($subjectRaw, 'UTF-8') : preg_replace('/[^\x20-\x7E]/', '', $subjectRaw);

$body  = "NEW CLEANING QUOTE REQUEST - Excellent Cleaning Ltd Website\n========================================\n\n";
$body .= "Client Name:     $name\nEmail Address:   $email\nTelephone:       $phone\nService:         $service\nPostcode / Town: $postcode\n";
if ($preferredDate) $body .= "Preferred Date:  $preferredDate\n";
if ($estimatedCost) $body .= "Estimated Scope: $estimatedCost\n";
$body .= "\n----------------------------------------\nJob Details / Special Instructions:\n$details\n----------------------------------------\n\n";
$body .= 'Received: ' . date('d/m/Y H:i:s') . "\nClient IP: $ip\n";

$host = strtolower(preg_replace('/^www\./', '', (string)parse_url('http://' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST)));
if (!preg_match('/^[a-z0-9.-]+\.[a-z]{2,}$/', $host)) $host = 'excellentcleaningltd.com';
$headers = ["From: Excellent Cleaning Website <no-reply@{$host}>", "Reply-To: {$email}", 'MIME-Version: 1.0', 'Content-Type: text/plain; charset=UTF-8'];
$cfg = is_file(__DIR__ . '/config.php') ? (require __DIR__ . '/config.php') : [];
$smtp = $cfg['smtp'] ?? [];
$sent = false;
if (!empty($smtp['host']) && !empty($smtp['pass'])) {
    require_once __DIR__ . '/includes/smtp.php';
    $smtpErr = '';
    $sent = smtp_send($smtp, $cfg['to'] ?? $to, $subject, $body, $email, $smtpErr);
    if (!$sent) error_log('Excellent Cleaning SMTP error: ' . $smtpErr);
}
if (!$sent) $sent = @mail($cfg['to'] ?? $to, $subject, $body, implode("\r\n", $headers)); // fallback

// Only report success if the enquiry reached the owner by email or is safely stored
if (!$sent && !$saved) out(false, 'Sorry, we could not process your request. Please contact us on WhatsApp or by phone.', 500);
out(true, 'Thank you! Your quote request has been received. Our team will review the details and contact you shortly.');
