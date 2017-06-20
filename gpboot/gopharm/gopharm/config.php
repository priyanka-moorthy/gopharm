<?php
/*$currency = '&#8377; '; //Currency Character or code

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                             'VAT' => 12, 
                             'Service Tax' => 5
                             );                      */
$DB_HOST="localhost";
$DB_NAME="gopharm";
$DB_USER="root"; 
$DB_PASSWORD="";
$conn=mysql_connect("localhost",$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
?>