<?php
session_start();
  if((!isset($_SESSION['email']))||$_SESSION['email']!='admin@rochester.com'){
  header("Location: ../html/index.php");
  }
  require_once './db_setup.php';
  $location=$_POST['location'];
  $product_name=$_POST['product_name'];
  $brand=$_POST['brand'];
  $quantity=$_POST['quantity'];
  $cost=$_POST['cost'];
  $sales=$_POST['sales'];

  $result=$conn->query("select * from Storage where Product_name='$product_name' and Brand='$brand' and Location='$location';");
  $result1=$conn->query("select * from Product where Product_name='$product_name' and Brand='$brand';");
  if($result->num_rows>0){
  	$query="update Storage set Quantity='$quantity' where Product_name='$product_name' and Brand='$brand' and Location='$location';";
  	$conn->query($query);
  	$total=$conn->query("select sum(Quantity) as s from Storage where Product_name='$product_name' and Brand='$brand';");
  	$sum=$total->fetch_assoc();
  	$s=$sum['s'];
	$conn->query("update Product set Total_quantity='$s', Cost='$cost', Sales_price='$sales' where Product_name='$product_name' and Brand='$brand';");
  }else{
  	if($result1->num_rows>0){
  		$total=$conn->query("select Total_quantity from Product where Product_name='$product_name' and Brand='$brand';");
	  	$sum=$total->fetch_assoc();
	  	$s=$sum['Total_quantity'];
	  	$conn->query("insert into Storage values('$location','$product_name','$brand','$quantity');");
	  	$conn->query("update Product set Total_quantity='$s'+'$quantity', Cost='$cost', Sales_price='$sales' where Product_name='$product_name' and Brand='$brand';");
  	}else{
  		$conn->query("insert into Product values('$product_name','$brand','$quantity','$cost','$sales');");
	  	$query="insert into Storage values('$location','$product_name','$brand','$quantity');";
	  	$conn->query($query);
  	}
  }
  header("Location: ../html/show_storage.php");
  //$query="select * from Storage where ;";
  //$result=$conn->query($query);
?>