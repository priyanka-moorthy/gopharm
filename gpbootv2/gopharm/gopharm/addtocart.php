<?php
session_start();
?>

<?php
if(empty($_SESSION['cart']))
$_SESSION['cart']=array(); 
 
if(isset($_GET['search'])){
	echo "<table border=1>";
	echo "<th>Product Name</th>";
	echo"<th>Price</th>";
	
	foreach($xml->categories->category->items->product aa $product)
	{
		$imageURL = $product->images->image[0]->sourceURL;
		$id=$Product['id'];
		echo"<te">;
		echo "<td><a href='buy.php?buy=".$id."><img src=".$imageURL."></img></a></td>";
		echo "<td>".$product->name."</td>";
		echo "<td>".'$'.$product->minPrice."</td>";
	}
	
	}
}
if(isset($_GET['buy'])){
	$product_id = $_GET['buy'];
	if(isset($_SESSION['cart'])){
		array_push($_SESSION['cart'],$product_id);
	
	}
	
}

print_r($_SESSION);
?>
