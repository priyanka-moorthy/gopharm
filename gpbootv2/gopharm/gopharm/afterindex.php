<?php
session_start();
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
if(isset($_POST['userid'])&&isset($_POST['Password']))
{
$id =$_POST['userid'];
echo $id;
$pass = $_POST['Password'];	
$query = "SELECT password,name FROM `users` WHERE `userid` = '$id'";
$pswrd = mysql_query($query);
if($pswrd)
{
	while($row = mysql_fetch_array($pswrd))
	{
		if($pass == $row[0])
		{
			$_SESSION['userid'] = $id;
			$_SESSION['username'] = $row[1];
			
		}
		else echo "Noooo :( ";
	}
}
}
?>