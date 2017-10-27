<?php
	require_once 'db_setup.php';
	$result = NULL;
	$sql = "SELECT * FROM Customer";
	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			All Customers
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<?php
			if($result == NULL || $result->num_rows == 0) {
				echo "No user found";
			}
			else {
		?>
				<h2> All Customers </h2>
				<table class="table table-striped">
					<tr>
						<th>E-mail</th>
						<th>Username</th>
						<th>Password</th>
						<th>Address</th>
					</tr>
		<?php
				while($row = $result->fetch_assoc()){
		?>
					<tr>
			        	<td><?php echo $row['Email']?></td>
			        	<td><?php echo $row['Username']?></td>
			        	<td><?php echo $row['Password']?></td>
			        	<td><?php echo $row['Address']?></td>
    				</tr>
    	<?php
    			}
    		}
    		#close db connection
    		$conn->close();
    	?>
	</body>
</html>