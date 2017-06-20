<html>
<head>
<title>My account</title>
<style>
#grad
{
	background: linear-gradient(#aa33cc,#aa66cc,#aa99cc,#aacccc);
	width: 100%;
	height: 100%;
}
</style>
</head>
<?php 
session_start(); 

echo "<body text='white'><div id='grad'><h1>Hi " . $_SESSION['username'] . "!</h1><hr>";?>
<?php echo "<center><form action='index2.php' method='post'><br><br><br><br><br><input type='submit' value='Order Now!'></form><br><br><br><form action='ggpp1.html' method='post'><input type='submit' value='Logout'></center></div></body>";
?>
</html>