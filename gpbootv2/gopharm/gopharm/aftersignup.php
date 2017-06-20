<?php
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
if(isset($_POST['submit']))
{
	$user="root";$password="";$database="gopharm";
	$con = mysql_connect("localhost",$user,$password,$database);
	if(!$con){ die("Connection Failed:". mysql_error()); }
	if(!mysql_select_db("gopharm")){
		die("Can't select database." . mysql_error());
		}
		$a = $_POST['name'];
		$b = $_POST['userid'];
		$c = $_POST['password'];
		$d = $_POST['phone'];
		$e = $_POST['mail'];
		$f = $_POST['address'];
		//echo $a . $b . $c . $d . $e . $f;
	$checkquery = "SELECT userid FROM users";
	$check = mysql_query($checkquery);
	while($row = mysql_fetch_array($check))
	{
		if($row[0] == $b) { $flag = 0; break; }
		else $flag = 1;
	}
	if($flag == 1)
	{
		$query = "INSERT INTO users(name,userid,password,phone,mail,address) VALUES('$a','$b','$c','$d','$e','$f')";
		$exec = mysql_query($query);
		if($exec) echo "<h1><font color='green'>Done!</font></h1>";	
	}
	else echo "Duplicate user ID. Click <a href='signup.html'>here</a> to sign up again.";
}
?>