<?php

require_once './vendor/autoload.php';

define('MAILGUN_KEY', 'key-3g2837tcldq4e3hwgput1x7mudqkabt0');
define('MAILGUN_PUBKEY', 'pubkey-4s9903tcborzdc8pmjqy7959nzr4h6v6');

define('MAILGUN_DOMAIN', 'sandboxb2d437c118ac4a2a9a616c1ed052e9f3.mailgun.org');
define('MAILGUN_LIST', 'news@sandboxb2d437c118ac4a2a9a616c1ed052e9f3.mailgun.org');
define('MAILGUN_SECRET', 'nokahisthebest');

$mailgun            = new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate    = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();



?>