<?php
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if($con){ die("Connection Failed:". mysqli_connect_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
if(isset($_POST['userid'])&&isset($_POST['Password']))
{
$id =$_POST['userid'];
$pass = $_POST['Password'];	
echo $id;
echo $pass;
$query = "SELECT password FROM `users` WHERE `userid` = '$id'";
$pswrd = mysql_query($query);
if($pswrd)
{
	while($row = mysql_fetch_array($pswrd))
	{
		if($pass = $row[0]) echo "Navigation to next page...";
		else echo "Noooo :( ";
	}
}
?>