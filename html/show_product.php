<?php 
  session_start();
  if((!isset($_SESSION['email']))||$_SESSION['email']!='admin@rochester.com'){
  header("Location: ./index.php");
  }
  //$email=$_SESSION['email'];
  require_once '../php/db_setup.php';
  $query="select * from Product;";
  $result=$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Product Information</h2>
  <p>see all of the products below</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product name</th>
        <th>Brand</th>
        <th>Total Quantity</th>
        <th>Cost</th>
        <th>Sales Price</th>
      </tr>
    </thead>
    <?php 
    if($result->num_rows>0){
      ?>
    <tbody>
      <?php while($row=$result->fetch_assoc()){
        $product_name=$row['Product_name'];
        $brand=$row['Brand'];
        $total_quantity=$row['Total_quantity'];
        $cost=$row['Cost'];
        $sales_price=$row['Sales_price']
        ?>
      <tr>
        <td><?php echo $product_name ?></td>
        <td><?php echo $brand ?></td>
        <td><?php echo $total_quantity ?></td>
        <td><?php echo $cost ?></td>
        <td><?php echo $sales_price ?></td>
      </tr>
      <?php } } ?>
    </tbody>
    <?php $conn->close(); ?>
  </table>
  <a href="./admin_main_page.php" class="btn btn-info" role="button">Back to home page</a>
</div>

</body>
</html>