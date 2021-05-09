<?php
require 'D:\Codes\SGC-main\SGC\PHPMailer-master\PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;
try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mailgun.org';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'postmaster@sandbox2f36b5e4a04a4ec88669a7a78458ceb2.mailgun.org';                     //SMTP username
    $mail->Password   = 'b0a8e26ab654e62a4680eb29d2bfdfee-1553bd45-1aefc723';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('postmaster@sandbox2f36b5e4a04a4ec88669a7a78458ceb2.mailgun.org', 'shubhu');
    $mail->addAddress($email,$name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $sub;
    $mail->Body    = $body;
    $mail->AltBody = $body;

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}