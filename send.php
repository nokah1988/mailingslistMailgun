<?php

require_once './init.php';

if (isset($_POST['subject'], $_POST['body'])) {
    
    $subject = $_POST['subject'];
    $body    = $_POST['body'];
    
    $mailgun->sendMessage(MAILGUN_DOMAIN, [
            'from'      => 'noreply@vandenhovennokah.be',
            'to'        => MAILGUN_LIST,
            'subject'   => $subject,
            'html'      => "{$body}<br><br><a href=\"%unsubscribe_url%\">Unsubscribe</a>"
        ]);
            
        header('Location: ./');
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Send | Mailings list</title>
        <link rel="stylesheet" href="css/global.css">
    </head>
    
    <body>
        <div class="container">
            <form action="send.php" method="POST">
                <div class="field">
                    <label>
                        Subject:
                        <input type="text" name="subject" autocomplete="off">
                    </label>
                </div>
                <div class="field">
                    <label>
                        Body:
                        <textarea name="body" rows="8"></textarea>
                    </label>
                </div>
                <input type="submit" value="send" class="button">
            </form>                
        </div>
    </body>
</html>
