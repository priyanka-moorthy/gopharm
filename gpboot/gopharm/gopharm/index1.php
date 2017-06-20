<?php
session_start();
include_once("config.php");
?>
<div class="products">
<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$results = $con->query("SELECT medid, mname,price,strengthunit FROM medicines ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
  //$products_item .= 
   echo "<li class='medicines'>
     <form method='post' action='cart_update.php'>
     <div class='mname'><h3>".$obj->mname."</h3>
	 <div class='price'>
     Price" . {$currency}{$obj->price} 
     
          . "<div class='strengthunit'>".{$obj->strenghtunit}."</div>
     
     <fieldset>
     
     <label>
         <span>Color</span>
         <select name='product_color'>
         <option value='Black'>Black</option>
         <option value='Silver'>Silver</option>
         </select>
     </label>
     
     <label>
         <span>Quantity</span>
         <input type='text' size='2' maxlength='2' name='qty' value='1' />
     </label>
     
     </fieldset>
     <input type='hidden' name='medid' value='".{$obj->medid}."' />
     <input type='hidden' name='type' value='add' />
     <input type='hidden' name='return_url' value='".{$current_url}."' />
     <div align='center'><button type='submit' class='add_to_cart'>Add</button></div>
     </div></div>
     </form>
     </li>"
}


$products_item .= '</ul>';
echo $products_item;
}
?>
 </div>
 
 <div class="shopping-cart">
 <h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
     echo '<div class="cart-view-table-front" id="view-cart">';
     echo '<h3>Your Shopping Cart</h3>';
     echo '<form method="post" action="cart_update.php">';
     echo '<table width="100%"  cellpadding="6" cellspacing="0">';
     echo '<tbody>';

     $total =0;
     $b = 0;
     foreach ($_SESSION["cart_products"] as $cart_itm)
     {
		  $medid = $cart_itm["medid"];
         $mname = $cart_itm["mname"];
         $qty = $cart_itm["qty"];
         $price = $cart_itm["price"];
         $strengthunit = $cart_itm["strengthunit"];
         $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
         echo '<tr class="'.$bg_color.'">';
         echo '<td>Qty <input type="text" size="2" maxlength="2" name="qty['.$medid.']" value="'.$qty.'" /></td>';
         echo '<td>'.$mname.'</td>';
         echo '<td><input type="checkbox" name="remove_code[]" value="'.$medid.'" /> Remove</td>';
         echo '</tr>';
         $subtotal = ($price * $qty);
         $total = ($total + $subtotal);
     }
     echo '<td colspan="4">';
     echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
     echo '</td>';
     echo '</tbody>';
     echo '</table>';
     
     $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
     echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
     echo '</form>';
     echo '</div>';

}
?>
 </div>