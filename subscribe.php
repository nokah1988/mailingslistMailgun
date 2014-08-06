<?php

require_once './init.php';

if (isset($_POST['name'], $_POST['email'])) {
    
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    
    $validate = $mailgunValidate->get('address/validate', [        
        'address' => $email        
    ])->http_response_body;
    
    # print_r($validate);
    
    if ($validate->is_valid) {
        
        $hash = $mailgunOptIn->generateHash(MAILGUN_LIST, MAILGUN_SECRET, $email);
        
        $mailgun->sendMessage(MAILGUN_DOMAIN, [
            'from'      => 'noreply@vandenhovennokah.be',
            'to'        => $email,
            'subject'   => 'please confirm your subscription to us',
            'html'      => "
                
                Hello {$name},<br><br>
                You signed up to our mailing list, please confirm below, <br><br>
                <a href=\"http://localhost/newsletter/confirm.php?hash={$hash}\">Subscribe link</a>
        "]);
                
        $mailgun->post('lists/' . MAILGUN_LIST . '/members', [
            'name'          => $name,
            'address'       => $email,
            'subscribed'    => 'no'            
        ]);
        
        header('Location: ./');
                
                
            
        
       
        
    } else {
        echo 'email is not correct';
    }
    
    
    
    

}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Subscribe | Mailings list</title>
        <link href="css/global.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <div class="container">
            <form action="subscribe.php" method="POST">
                <div class="field">
                    <label>
                        Name:
                        <input type="text" name="name" autocomplete="off">
                    </label>
                </div>
                <div class="field">
                    <label>
                        Email:
                        <input type="text" name="email" autocomplete="off">
                    </label>
                </div>
                <input type="submit" value="subscribe" class="button">
            </form>
        </div>
    </body>
    
    
    
</html>