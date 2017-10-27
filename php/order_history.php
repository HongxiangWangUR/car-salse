<?php 
  session_start();
  if(!isset($_SESSION['email'])){
  header("Location: ./index.php");
  }
  $email=$_SESSION['email'];
  require_once 'db_setup.php';
  $query="select * from Sales where Email='$email';";
  $result=$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order History</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Order History</h2>
  <p>see the order history below</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Brand</th>
        <th>quantity</th>
        <th>order date</th>
      </tr>
    </thead>
    <?php 
    if($result->num_rows>0){
      ?>
    <tbody>
      <?php while($row=$result->fetch_assoc()){
        $product_name=$row['Product_name'];
        $brand=$row['Brand'];
        $quantity=$row['Quantity'];
        $date=$row['Sale_date'];
        ?>
      <tr>
        <td><?php echo $product_name ?></td>
        <td><?php echo $brand ?></td>
        <td><?php echo $quantity ?></td>
        <td><?php echo $date ?></td>
      </tr>
      <?php } } ?>
    </tbody>
    <?php $conn->close(); ?>
  </table>
  <a href="../html/Erp_system.php" class="btn btn-info" role="button">Back to home page</a>
</div>

</body>
</html>