<?php
// 1. Copy this file to config.php  2. Fill in the password  3. Never share or commit config.php
// Yahoo requires an APP PASSWORD (Yahoo Account Security > Generate app password), not your normal password.
// Yahoo only sends mail "From" the same Yahoo address you log in with.
return [
    'to'   => 'excellentcleaningltd@yahoo.com',
    'smtp' => [
        'host'      => 'smtp.mail.yahoo.com',
        'port'      => 465,          // 465 with 'ssl', or 587 with 'tls'
        'secure'    => 'ssl',        // 'ssl' | 'tls' (STARTTLS)
        'user'      => 'excellentcleaningltd@yahoo.com',
        'pass'      => '',           // <-- Yahoo app password
        'from'      => 'excellentcleaningltd@yahoo.com',
        'from_name' => 'Excellent Cleaning Website',
    ],
];
