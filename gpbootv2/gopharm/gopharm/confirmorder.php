<?php
session_start();
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
$i=0;
foreach($_SESSION['medname'])
{
$insertorder = "INSERT INTO `orders` VALUES($_SESSION['userid'],$_SESSION['medname'],$_SESSION['notab['$i']']);";
$exec = mysql_query($insertorder);
if($exec) echo "Order placed!";
else echo ":( Sowieee";
$i++;
}
?>