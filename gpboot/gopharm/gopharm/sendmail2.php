<?php
require 'C:\xampp\htdocs\PHPMailer-master\PHPMailerAutoload.php';
session_start();
//$id = $_SESSION['userid'];
//echo  "i am" .  . ":)";
//$query="SELECT mailid,name FROM users WHERE userid='$_SESSION['userid']'";
$mail = new PHPMailer;
if(!$mail) echo "$Mail not set.";
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mvs.priyanka2010@gmail.com';                 // SMTP username
$mail->Password = 'feb!^sep&26';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl','tls' also accepted
$mail->Port = 465;                           //TCP port to connect to

$mail->From = 'mvs.priyanka2010@gmail.com';
$mail->FromName = 'Moorthy';


$mail->addAddress($row[0], $row[1]);     // Add a recipient
$mail->addAddress('rohithsusi@gmail.com');               // Name is optional
$mail->addReplyTo('mvs.priyanka2010@gmail.com', 'It is working, bitch! :D');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Medicine Order';
$mail->Body    = '<b>Your order for Gopharm has been placed.</b>';
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}