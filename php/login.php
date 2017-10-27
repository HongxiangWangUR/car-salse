<?php
	require_once 'db_setup.php';
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="select * from Customer where Email='$email' and Password='$password';";
	$result=$conn->query($query);
	if($result->num_rows>0){
		session_start();
		$_SESSION['email']=$email;
		if($email=="admin@rochester.com")
			header("Location: ../html/admin_main_page.php");
		else
		    header("Location: ../html/Erp_system.php"); 
	}else{
		echo "Your email address or password is wrong, please try again";
		header("Location: ../html/index.php");
	}
?>