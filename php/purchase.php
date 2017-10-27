<?php
//check whether user is login
session_start();
if(!isset($_SESSION['email'])){
  header("Location: ../html/index.php");
  }
$email=$_SESSION['email'];
 //get the connection from the database
require_once 'db_setup.php';
//get the data from front end
$product_name=$_POST['product_name'];
$brand=$_POST['brand'];
$price=$_POST['price'];
$numberleft=$_POST['numberleft'];
$amount=$_POST['amount'];
$checktag=$_POST['check'];
$storage_place=$_POST['storage'];
$tag=0;
$success=true;
$conn->query("start transaction;");
while($tag<count($checktag)){
	//find which item is checked
	$checked=$checktag[$tag];
	//check the amount of selected item is satisfied the amount of item in the selected place
	$check_amount="select * from Storage where Product_name='$product_name[$checked]' and Brand='$brand[$checked]' and Location='$storage_place[$checked]';";
	$result=$conn->query($check_amount);
	$row=$result->fetch_assoc();
	if($row['Quantity']<$amount[$checked])
		{
			$success=false;
			break;
		}
	else{//begin to make puchase and 3 tables need to be changed
		//begin to change table Product
		$change_product_table="update Product set Total_quantity=Total_quantity-'$amount[$checked]' where Product_name='$product_name[$checked]' and Brand='$brand[$checked]';";
		$conn->query($change_product_table);
		//echo mysqli_affected_rows($conn);

		//begin to change table Storage;
		$change_storage_table="update Storage set Quantity=Quantity-'$amount[$checked]' where Product_name='$product_name[$checked]' and Brand='$brand[$checked]' and Location='$storage_place[$checked]';";
		$conn->query($change_storage_table);
		//echo mysqli_affected_rows($conn);

		//begin to change table Sales;
		$change_sales_table="insert into Sales(Email,Product_name,Brand,Quantity) values('$email','$product_name[$checked]','$brand[$checked]','$amount[$checked]');";
		$conn->query($change_sales_table);
		//echo mysqli_affected_rows($conn);
	}
	//increment to the tag variable
	$tag+=1;
}
if($success){//if purchase success, commit all of the operaion
	$conn->query("commit;");
	$conn->close();
	header("Location: ../html/purchase_success.html");
}
else{//if purchase failed, rollback all of the operation
	$conn->query("rollback;");
	$conn->close();
	header("Location: ../html/selected_number_error.html");
}
?>