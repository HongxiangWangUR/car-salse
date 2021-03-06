<?php 
  session_start();
  if(!isset($_SESSION['email'])){
  header("Location: ./index.php");
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Erp System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}

  #linkcolor{ color:white;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Product Sales System</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="../php/list_product.php">Purchase</a></li>
          <li><a href="../php/order_history.php">Check order history</a></li>
          <li><a href="./change_profile.php">change personal profile</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <h1>Purchase</h1>
  <a href="../php/list_product.php" id="linkcolor">Make Purchase</a>
</div>
<div id="section2" class="container-fluid">
  <h1>Check order history</h1>
  <a href="../php/order_history.php" id="linkcolor">Check Order History</a>
</div>
<div id="section3" class="container-fluid">
  <h1>Change Profile</h1>
  <a href="./change_profile.php" id="linkcolor">change personal profile</a>
</div>

</body>
</html>