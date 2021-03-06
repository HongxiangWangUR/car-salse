<?php
session_start();
if(isset($_SESSION['email'])){
  if($_SESSION['email']=="admin@rochester.com")
    header("Location: ./admin_main_page.php");
  else
    header("Location: ./Erp_system.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Erp system login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login to the system</h2>
  <form action="../php/login.php" method="post">
    <div class="form-group">
      <label for="usr">E-mail:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
    </div>

    <!-- <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div> -->
    
    <!-- <button type="submit" class="btn btn-default" onclick="window.open('../html/Erp_system.html');">login</button>
    <button class="btn btn-default" onclick="window.open('../html/sign_up.html');">sign up</button>
    <button class="btn btn-default" onclick="window.open('../html/admin_main_page.html');">admin login</button>
 -->
    <input type="submit" class="btn btn-default" value="login"/>
    <a href="sign_up.html" class="btn btn-info" role="button">Sign Up</a>
  </form>
  <!-- <button class="btn btn-default" onclick="location.href='sign_up.html'">sign up</button> -->
</div>

</body>
</html>