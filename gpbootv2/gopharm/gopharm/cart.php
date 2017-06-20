<?php
session_start();
?>
<html>
<head>
<title>Demo of Session array used for cart from plus2net.com</title>
</head>
<body>
<?php
echo "Number of Items in the cart = ".sizeof($_SESSION['medname'])." <a href=cart-remove-all.php>Remove all</a><br>";
?>
</body>
</html>