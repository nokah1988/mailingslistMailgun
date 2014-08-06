<?php

require_once './vendor/autoload.php';

define('MAILGUN_KEY', 'key-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('MAILGUN_PUBKEY', 'pubkey-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

define('MAILGUN_DOMAIN', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.mailgun.org');
define('MAILGUN_LIST', 'xxx@sandboxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.mailgun.org');
define('MAILGUN_SECRET', 'xxxxxxxxxxxxxxxxxxxx');

$mailgun            = new Mailgun\Mailgun(MAILGUN_KEY);
$mailgunValidate    = new Mailgun\Mailgun(MAILGUN_PUBKEY);

$mailgunOptIn = $mailgun->OptInHandler();



?>
