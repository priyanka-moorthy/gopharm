<?php
session_start();
require 'C:\xampp\htdocs\PHPMailer-master\PHPMailerAutoload.php';
$DB_HOST="localhost";
$DB_NAME="gopharm";
$DB_USER="root"; 
$DB_PASSWORD="";
$conn=mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$conn) {
    die("Connection failed: " . mysql_error());
} 
$con=mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$con) 
{
    die("Connection failed: " . mysql_error());
} 
if(!mysql_select_db("gopharm")){die("Can't select database." . mysql_error());}
$id=$_SESSION['username'];
$result="SELECT mailid,name FROM users WHERE name='$id'";
$query= mysql_query($result);
	while($row = mysql_fetch_array($query))
	{
		$mail = new PHPMailer;
		$mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPDebug = 4;
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mvs.priyanka2010@gmail.com';                 // SMTP username
        $mail->Password = 'feb!^sep&26';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('mvs.priyanka2010@gmail.com', 'OtE');
        $mail->addAddress($row[0], $row[1]);     // Add a recipient
        $mail->addReplyTo('mvs.priyanka2010@gmail.com', 'OtE');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Medicine Order';
        $mail->Body    = 'Your order for GoPharm has been placed.';
        $mail->AltBody = 'Order has been placed.';
        if(!$mail->send()) 
		{
          echo 'Message could not be sent.';
		  //header("pg1 login.html");
        } 
        else 
		{
         echo "Message has been sent to " . $row[0] . ".Login to your mail and enter the password given. Click <a href='pg1 login.html'>here</a> to go back to Login page.";
        }
	}
if(!mysql_query($result))
{
 echo "Error: " . $result . "<br>" . mysql_error($con);
}

?>