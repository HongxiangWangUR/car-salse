<?php 
  session_start();
  if(!isset($_SESSION['email'])){
  header("Location: ../html/index.php");
  }
  require_once 'db_setup.php';
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $address=$_POST['address'];
  $query="update Customer set Username='$username', Password='$password',Address='$address' where Email='$email';";
  $result=$conn->query($query);
  if(mysqli_affected_rows($conn)!=0)
  	header("Location: ../html/change_profile_success.html");
  else
  	header("Location: ../html/change_profile_error.html")
?>