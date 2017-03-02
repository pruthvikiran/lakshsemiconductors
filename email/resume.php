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

$mail->setFrom('info@lakshsemi.com', 'Lakshsemiconductors');
$mail->addAddress('sekhar.vakada@lakshsemi.com', 'Lakshsemiconductors');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('sekhar.vakada@lakshsemi.com', 'Lakshsemiconductors');
//$mail->addCC('kiranpruthvi@gmail.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/resume.tar.gz.txt.pdf');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$name = $_POST['name'];
$email = $_POST['email'];
//$subject = $_POST['subject'];
$jobrole = $_POST['jobrole'];
//$address = $_POST['address'];
$message = $_POST['message'];
$message2 = "<br/><b>name is:</b>&emsp;" . $name . "\n\n" .  "<br><b>The e-mail id is:</b>&emsp;"  .  $email  .  "\n\n"  . "<br><b>Job Role:</b>&emsp;"  .  $jobrole  .  "\n\n"  .  "<br><b>the message is:</b>&emsp;"  .  $_POST['message'];

$mail->FromName = $name;
$mail->From    = $email;
$mail->Subject = 'This mail is from Career form From lakshsemi.com';
$mail->Body    = $message2;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Your Resume has been successfully sent';
}

?>