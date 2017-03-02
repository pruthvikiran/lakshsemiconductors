<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreply.lakshsemi@gmail.com';                 // SMTP username
$mail->Password = 'laksh@123';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('info@lakshsemi.com', 'Laksh Semiconductors');
$mail->addAddress('sekhar.vakada@lakshsemi.com ', 'Laksh Semiconductors');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('sekhar.vakada@lakshsemi.com ', 'Laksh Semiconductors');
//$mail->addCC('kiranpruthvi@gmail.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$name = $_POST['name'];
$email = $_POST['email'];
//$subject = $_POST['subject'];
$phone = $_POST['phone'];
//$address = $_POST['address'];
$message = $_POST['message'];
$message2 = "<br/><b>name is:</b>&emsp;" . $name . "\n\n" .  "<br><b>The e-mail id is:</b>&emsp;"  .  $email  .  "\n\n"  . "<br><b>phone no:</b>&emsp;"  .  $phone  .  "<br><b>the message is:</b>&emsp;"  .  $_POST['message'];

//$mail->FromName = $name;
//$mail->From    = $email;
$mail->Subject = 'This mail is from lakshsemi.com contact form';
$mail->Body    = $message2;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>