<?php
	require_once 'db_setup.php';
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$address=$_POST['address'];

	$query="select * from Customer where Email='$email';";
	$result=$conn->query($query);
	if($result->num_rows>0){
		echo "the Email is already exists, please use another one";
		header("Location: ../html/sign_up.html");
	}else{
		$insert="insert into Customer values ( '$email', '$username', '$password', '$address' );";
		if($conn->query($insert)===TRUE){
			session_start();
			$_SESSION['email']=$email;
			echo "Sign up success!";
			header("Location: ../html/Erp_system.php"); 
		}else{
			echo "Create new account failed, please try again";
			header("Location: ../html/sign_up.html");
		}
	}
?>