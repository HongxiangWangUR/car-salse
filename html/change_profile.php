<?php 
  session_start();
  if(!isset($_SESSION['email'])){
  header("Location: ./index.php");
  }
  $email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/jquery-3.2.0.min.js"></script>
  <script src="../js/check_change_profile.js"></script>
</head>
<body>

<div class="container">
  <h2>Input Your Information Below</h2>
  <form action="../php/modify.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $email ?>" readonly="readonly" name="email"/>
    </div>
    <div class="form-group">
      <label for="pwd">Username:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter username" name="username"/>
    </div>
    <div class="form-group">
      <label for="pwd">New Password:</label>
      <input type="password" class="form-control" id="password1" placeholder="Enter new password" name="password"/>
    </div>
    <div class="form-group">
      <label for="pwd">Retype your new Password:</label>
      <input type="password" class="form-control" id="password2" placeholder="retype new password"/>
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="input address" name="address"/>
    </div>
    <button type="submit" class="btn btn-default" id="submit">Submit</button>
    <a href="../html/Erp_system.php" class="btn btn-info" role="button">Back to home page</a>
  </form>
</div>

</body>