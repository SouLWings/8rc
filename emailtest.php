<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = '8rc.um.edu.my@gmail.com';
$mail->Password = '8rcumedumy';

$mail->From = '8rc.um.edu.my@gmail.com';
$mail->FromName = 'Non-reply-KinaMail';
$mail->addAddress('sheenyeen@siswa.um.edu.my');  // Add a recipient
$mail->isHTML(true);
$mail->Subject = 'Pending account approval';
$mail->Body    = 'Dear Senopi,<br/><p><b>Thank you</b> for registering yourself with <span style="color:red"><b>8RC Portal</b></span>. You will be notified when your account gets approved. Meanwhile, feel free to enjoy the oyster set below.<br/><br/><img src="http://graphics8.nytimes.com/images/2008/05/16/timestopics/2oysters-395.jpg" /><br/></p>Best regards, <br/>8RC Portal.<h6>This is auto generated email, no signiture is required.</h6>';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';