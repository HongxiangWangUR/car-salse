<?php
	require_once 'db_setup.php';
	$result = NULL;
	$sql = "SELECT * FROM Sales";
	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			All Sales
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<?php
			if($result == NULL || $result->num_rows == 0) {
				echo "No sales yet";
			}
			else {
		?>
				<h2> Sales Records </h2>
				<table class="table table-striped">
					<tr>
						<th>User E-mail</th>
						<th>Product name</th>
						<th>Brand</th>
						<th>Quantity</th>
						<th>Date</th>
					</tr>
		<?php
				while($row = $result->fetch_assoc()){
		?>
					<tr>
			        	<td><?php echo $row['Email']?></td>
			        	<td><?php echo $row['Product_name']?></td>
			        	<td><?php echo $row['Brand']?></td>
			        	<td><?php echo $row['Quantity']?></td>
			        	<td><?php echo $row['Sale_date']?></td>
    				</tr>
    	<?php
    			}
    		}
    		#close db connection
    		$conn->close();
    	?>
	</body>
</html>