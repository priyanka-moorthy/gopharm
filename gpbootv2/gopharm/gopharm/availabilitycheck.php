<?php
session_start();
$user="root";$password="";$database="gopharm";
$con = mysql_connect("localhost",$user,$password,$database);
if(!$con){ die("Connection Failed:". mysql_error()); }
if(!mysql_select_db("gopharm")){
	die("Can't select database." . mysql_error());
}
if(isset($_POST['submit']))
{
$_SESSION['medname'] = array(
0=>$_POST['tabletname1'],
1=>$_POST['tabletname2'],
2=>$_POST['tabletname3']);
$_SESSION['mgtab']  = array(
0=>$_POST['mgtab1'],
1=>$_POST['mgtab2'],
2=>$_POST['mgtab3']);
$_SESSION['notab'] = array(
0=>$_POST['notab1'],
1=>$_POST['notab2'],
2=>$_POST['notab3']);
$i=0;
while($i<=2)
{
$medavail = "SELECT * FROM `medicines` WHERE mname='$_SESSION['medname['$i']'] AND strengthunit='$_SESSION[notab[$i]]'";
$exec = mysql_query($medavail);
if($exec)
{
 while($row = mysql_fetch_array($exec))
 {
	 $_SESSION['price'] = array($row[3]);
	 $_SESSION['total'] = array($_SESSION['price[$i]'] * $_SESSION['notab']);
 }
}
else
{
	echo "<font face='Lucida Handwriting'>Sorry, the medicine " . $_SESSION['medname['$i']'] ." requested by you seems unfamiliar to us.</font>";
}
$i++;
}	
}	
?>
<html>
<head>
</head>
<body bgcolor="white">
<CENTER>
<font face="consolas" color="teal" size="8">
<h1>REQUIRED MEDICINE DETAILS</h1></font></center>   
<form name="orders"  action="availabilitycheck.php" method="post"><br><br><br><br><br><br><br><br>
<font face="consolas" size="6" color="teal"><center>
<?php
$tamt = 0;
$i=0;
while($i<=2)
{
echo "Tablet name: " . $_SESSION['medname['$i']'] . "<br>Quantity: " . $_SESSION['notab['$i']'] . "<br>Price per tablet: Rs." . $_SESSION['price['$i']'] . "<br>Estimated amount: Rs." . $_SESSION['total['$i']'];
$tamt+=$_SESSION['total['$i']'];
$i++;
}
echo "<font size='5'><b>Total amount = Rs. " .$tamt;
?>
</font></center>
<center>
<form action="orderconfirmed.php" method="post"><input type="submit" value="Confirm"></form>
<form action="dontwannaplaceorder.php"><input type="submit" value="Reject Order"></form>
</center>
</body>
</html>