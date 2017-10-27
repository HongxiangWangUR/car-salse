<?php 
  session_start();
  if(!isset($_SESSION['email'])){
  header("Location: ../html/index.php");
  }
  require_once 'db_setup.php';
  $query="select * from Product;";
  $result=$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>find product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="../js/jquery-3.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/checkPurchase.js" type="text/javascript"></script>
</head>
<body>
<form action="purchase.php" method="post">
<div class="container">
  <h2>Find your product</h2>
  <p>Get what you want</p>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Total Amount left</th>
        <th>Select</th>
        <th>Order Quantity</th>
        <th>Get the Product From</th>
      </tr>
    </thead>
    <?php 
      if($result->num_rows>0){
      ?>  
    <tbody>
      <?php
        $tag=0;//this line is used to tag which item is selected
        while($row=$result->fetch_assoc()){
          $product_name=$row['Product_name'];
          $brand=$row['Brand'];
          $query_storage="select * from Storage where Product_name='$product_name' and Brand='$brand' and Quantity!=0;";
          $storage_place=$conn->query($query_storage);
      ?>
      <tr>
        <!-- send product name -->
        <td><input type="text" value="<?php echo $row['Product_name']?>" readonly="readonly" name="product_name[]"/></td>
        <!-- send brand name -->
        <td><input type="text" value="<?php echo $row['Brand']?>" readonly="readonly" name="brand[]"/></td>
        <!-- send price -->
        <td><input type="number" value="<?php echo $row['Sales_price']?>" readonly="readonly" name="price[]"/></td>
        <!-- send the number left -->
        <td><input type="number" value="<?php echo $row['Total_quantity']?>" readonly="readonly" class="numberleft" name="numberleft[]"/></td>
        <!-- send checkbox -->
        <td><label><input type="checkbox" name="check[]" value="<?php echo $tag?>" class="checktag"/>Click to select the item</label></td>
        <!-- send purchase amount -->
        <td><input type="number" name="amount[]" class="amount"/></td>
        <!-- send storage place -->
        <td><select name="storage[]">
          <?php while($s_row=$storage_place->fetch_assoc()){ ?>
            <option value="<?php echo $s_row['Location'] ?>"><?php echo $s_row['Location'] ?></option>
          <?php } ?>
        </select></td>
      </tr>
      <?php $tag=$tag+1; } } ?>
    </tbody>
    <?php $conn->close(); ?>
  </table>
  <!-- <input type="text" value="3" readonly="readonly" name="test"/> -->
  <input type="submit" class="btn btn-default" value="Submit" id="submit"/>
  </form>
  <a href="../html/Erp_system.php" class="btn btn-info" role="button">Back to home page</a>
</body>
</html>