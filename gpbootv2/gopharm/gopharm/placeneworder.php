<?php
session_start();
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}

?>