<?php 
  session_start();
  if((!isset($_SESSION['email']))||$_SESSION['email']!='admin@rochester.com'){
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
    #section4 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
    #section5 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}

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
          <li><a href="./show_warehouse.php">manage warehouse</a></li>
          <li><a href="./show_customer.php">customers</a></li>
          <li><a href="./show_product.php">product</a></li>
          <li><a href="./show_storage.php">storage</a></li>
          <li><a href="./show_sales.php">sales</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div id="section1" class="container-fluid">
  <h1>Warehouse</h1>
  <a href="./show_warehouse.php" id="linkcolor">Manage Warehouse</a>
</div>
<div id="section2" class="container-fluid">
  <h1>Customers</h1>
  <a href="./show_customer.php" id="linkcolor">Show All Customers</a>
</div>
<div id="section3" class="container-fluid">
  <h1>Product</h1>
  <a href="./show_product.php" id="linkcolor">Show All Products</a>
</div>
<div id="section4" class="container-fluid">
  <h1>Storage</h1>
  <a href="./show_storage.php" id="linkcolor">Manage Storage</a>
</div>
<div id="section5" class="container-fluid">
  <h1>Sales</h1>
  <a href="./show_sales.php" id="linkcolor">Show All Sales</a>
</div>
</body>
</html>