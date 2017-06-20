<?php
session_start();
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
if(isset($_POST['submit']))
$medname1 = $_POST['tabletname'];
$medstrengthunit1 = $_POST['mgtab'];
$mednumb1 = $_POST['notab'];
$medavail1 = "SELECT * FROM `medicines` WHERE mname='$medname1' AND strengthunit='$medstrengthunit1'";

$exec1 = mysql_query($medavail1);
 while($row = mysql_fetch_array($exec1))
 {
	 $price = $row[3];
	 $total = $price * $mednumb1;
 }
?>
<html>
<head>
<!link rel='stylesheet' href='userorder.css' type='text/css' /> 
</head>
<body bgcolor="white">
<CENTER>
<font face="consolas" color="teal" size="8">
<h1>REQUIRED MEDICINE DETAILS</h1></font></center>   
<form name="orders"  action="sendmail3.php" method="post"><pre>





</pre>
<font face="consolas" size="6" color="teal"><center>
<?php echo "Tablet name: " . $medname1 . "<br>Quantity: " . $mednumb1 . "<br>Price per tablet: Rs." . $price . "<br>Estimated amount: Rs." . $total; ?>
</font></center>
<center>
<br><input type="submit" value="Confirm">
<br><a href="index.php">next</a><br>
<a href="ggpp1.html" style="text-decoration: none;">Logout & Home Page</a></center>
</body>
</html>