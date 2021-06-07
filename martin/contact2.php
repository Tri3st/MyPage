<?php
  if (isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    ini_set('sendmail_from', 'admin@vandiest.xyz');
    $myMail = "admin@vandiest.xyz";
    $header = "From: " . $email . "\r\n" .
        "Content-Type: text/plain; charset=utf-8" . "\r\n" . 
        "X-Mailer: PHP/" . phpversion();
    $message2 = "== You have a message from " . $name . "==\n\n" . $message;
    
    //1. email sending to
    //2. subject
    //3. the message
    $succes = mail($myMail, $subject, $message2, $header);    if (!$succes){
        $errorMessage = error_get_last()['message'];    
        echo "Error: {$errorMessage}";
    }
    header("Location: index.php?mailsentsuccesfull");
  }
?>