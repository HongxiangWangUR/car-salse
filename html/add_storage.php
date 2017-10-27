<?php
session_start();
  if((!isset($_SESSION['email']))||$_SESSION['email']!='admin@rochester.com'){
  header("Location: ./index.php");
  }
  require_once '../php/db_setup.php';
  $query="select * from Warehouse;";
  $result=$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Storage Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/jquery-3.2.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/check_update_num.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
  <h2>Update Storage Information Below</h2>
  <form action="../php/update_storage.php" method="post">
    <div class="form-group">
      <label for="location">Location:</label>
      <!-- <input type="text" class="form-control" id="text" placeholder="Enter email" name="email"> -->
      <select class="form-control" name="location">
      	<?php while($row=$result->fetch_assoc()){ ?>
		  <option value="<?php echo $row['Location'] ?>"><?php echo $row['Location'] ?></option>
		<?php } ?>
	  </select>
    </div>
    <div class="form-group">
      <label for="username">Product Name:</label>
      <input type="text" class="form-control" placeholder="Enter Product name" name="product_name">
    </div>
    <div class="form-group">
      <label for="addr">Brand:</label>
      <input type="text" class="form-control" placeholder="Enter Brand" name="brand">
    </div>
    <div class="form-group">
      <label for="pwd">Quantity:</label>
      <input type="number" class="form-control" placeholder="Enter quantity" name="quantity" id="quantity"/>
    </div>
    <div class="form-group">
      <label for="pwd">Cost:</label>
      <input type="number" class="form-control" placeholder="Enter Cost" name="cost" id="cost"/>
    </div>
    <div class="form-group">
      <label for="pwd">Sales Price:</label>
      <input type="number" class="form-control" placeholder="Enter Sales Price" name="sales" id="sales"/>
    </div>
    <input type="submit" class="btn btn-default" value="Update" id="update"/>
    <!-- <button  class="btn btn-default" onclick="window.open('admin_main_page.html');">admin sign up</button> -->
    <a href="./admin_main_page.php" class="btn btn-info" role="button">Back to Main Page</a>
  </form>
  <!-- <button  style="display:inline;" class="btn btn-default" onclick="location.href='index.html'">Go Back to Login</button> -->
</div>
</body>
</html>