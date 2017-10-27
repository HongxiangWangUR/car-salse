<?php
//check the user's identity
session_start();
if((!isset($_SESSION['email']))||$_SESSION['email']!='admin@rochester.com'){
header("Location: ./index.php");
}
$location=$_POST['location'];
//get connected from database
require_once './db_setup.php';
$query="select * from Storage where Location='$location';";
$result=$conn->query($query);
while($row=$result->fetch_assoc()){
	$quantity=$row['Quantity'];
	$product_name=$row['Product_name'];
	$brand=$row['Brand'];
	$conn->query("update Product set Total_quantity=Total_quantity-'$quantity' where Product_name='$product_name' and Brand='$brand';");
	$conn->query("delete from Warehouse where Location='$location';");
}
header("Location: ../html/show_warehouse.php");
?>