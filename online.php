<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'usernameAnda';                 // SMTP username
$mail->Password = '12345';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('usernameAnda@gmail.com', 'PT. Anda');
$mail->addAddress('friends1@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('friends2@yahoo.co.id');
$mail->addBCC('friends3@gmail.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Warning..!! Server mengalami gangguan';
$mail->Body    = 'Segera Cek server..!! server mungkin mengalami gangguan 
		  atau service server <b style=color:red;>BERHENTI</b>  <br><br><br>Cek Status Service Server : https://yourdomain.com<br>';
$mail->AltBody = 'Server not running..!!!';
$mail->send();

//if(!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    echo 'Message has been sent';
//}
