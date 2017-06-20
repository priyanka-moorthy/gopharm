<?php
session_start();
//include_once("config.php");
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
$name = $_POST['medselect'];
 echo "<br><br><br><br><br>";
foreach ($name as $medid){
	$query = "SELECT * FROM `medicines` WHERE `mid`='$medid'";
	$result=mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		echo "<center><B>MEDICINE NAME:</B>".$row[1];
		echo "<br><B>MEDICINE TYPE:</B>".$row[2];
		echo "<br><B>STRENGTH UNIT:</B>".$row[4];
		echo "<br><B>PRICE:</B>".$row[3];
		echo "<br><B>QUANTITY:</B><input type='textbox' SIZE='3' name='quantity[]' id='qty' value=''>";
		echo "<hr width='10%'><br><br>";
		
	}
}
echo "<input type='submit' value='BUY'>";
?>