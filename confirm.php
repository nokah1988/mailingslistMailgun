<?php

require_once './init.php';

if (isset($_GET['hash'])) {
    
    $hash = $mailgunOptIn->validateHash(MAILGUN_SECRET, $_GET['hash']);
    
    if ($hash) {
        
        $list = $hash['mailingList'];
        $email = $hash['recipientAddress'];
        
        $mailgun->put('lists/' . MAILGUN_LIST . '/members/' . $email, [
            'subscribed'    => 'yes' 
        ]);
        
        $mailgun->sendMessage(MAILGUN_DOMAIN, [
            'from'      => 'noreply@vandenhovennokah.be',
            'to'        => $email,
            'subject'   => 'you have just subscribed',
            'html'      => 'Thanks for confirming, you are now subscribed.'
        ]);
        
        header('Location: ./');
        
    }
}



?>

