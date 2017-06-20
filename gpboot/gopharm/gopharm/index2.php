<?php
session_start();
//include_once("config.php");
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
echo "<html><head><title>Medicine List</title></head><body>";
$query="SELECT * FROM `medicines`";
$result = mysql_query($query);
echo "<table border='1' HEIGHT='70%' WIDTH='40%'>";
echo "<form method='post' action='showselected.php'>";

while($row = mysql_fetch_array($result))
{
	echo "<tr><td><B>MEDICINE NAME:</B>".$row[1];
	echo "<br><B>MEDICINE TYPE:</B>".$row[2];
	echo "<br><B>STRENGTH UNIT:</B>".$row[4];
	echo "<br><B>PRICE:</B>".$row[3];
	echo "</td><td><input type='checkbox' name='medselect[]' id='medselect' value='".$row[0]."'></td></tr>";
	
}
echo "<tr><td colspan='2'><center><input type='submit' value='submit'></center></td></tr></table>";
?>
</body>
</html>


