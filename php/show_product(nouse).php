<?php
	require_once 'db_setup.php';
	$result = NULL;
	$sql = "SELECT * FROM Product";
	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			All Products
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<?php
			if($result == NULL || $result->num_rows == 0) {
				echo "No product yet";
			}
			else {
		?>
				<h2> All Products </h2>
				<table class="table table-striped">
					<tr>
						<th>Product Name</th>
						<th>Brand</th>
						<th>Total Quantity</th>
						<th>Cost</th>
						<th>Sale Price</th>
					</tr>
		<?php
				while($row = $result->fetch_assoc()){
		?>
					<tr>
			        	<td><?php echo $row['Product_name']?></td>
			        	<td><?php echo $row['Brand']?></td>
			        	<td><?php echo $row['Total_quantity']?></td>
			        	<td><?php echo $row['Cost']?></td>
			        	<td><?php echo $row['Sales_price']?></td>
    				</tr>
    	<?php
    			}
    		}
    		#close db connection
    		$conn->close();
    	?>
	</body>
</html>