<?php
	require_once 'db_setup.php';
	$result = NULL;
	$sql = "SELECT * FROM Warehouse";
	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			All warehouses
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<?php
			if($result == NULL || $result->num_rows == 0) {
				echo "No warehouse found";
			}
			else {
		?>
				<h2> All Warehouse location </h2>
				<table class="table table-striped">
					<tr>
						<th>Location</th>
					</tr>
		<?php
				while($row = $result->fetch_assoc()){
		?>
					<tr>
			        	<td><?php echo $row['Location']?></td>
    				</tr>
    	<?php
    			}
    		}
    		#close db connection
    		$conn->close();
    	?>
	</body>
</html>
