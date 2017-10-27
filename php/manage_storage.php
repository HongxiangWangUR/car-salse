<?php
	require_once 'db_setup.php';
	$loc_result = NULL;
	$pro_result = NULL;
	$loc_sql = "SELECT Location From Warehouse";
	$pro_sql = "SELECT DISTINCT Brand From Product";
	$loc_result = $conn->query($loc_sql);
	$pro_result = $conn->query($pro_sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Storage Management</title>
	</head>
	<body>
		<form action="manage_storage.php" action="POST">
			<?php
				if($loc_result == NULL || $loc_result->num_rows == 0) {
					echo "No warehouse found";
				}
				elseif($pro_result == NULL || $pro_result->num_rows == 0) {
					echo "No product found";
				}
				else {
			?>
					<label>Warehouse</label>
					<select>
						<?php
							foreach ($loc_result as $location) {
						?>
								<option value="<?php echo $location['Location']; ?>">
									<?php echo $location['Location']; ?>
								</option>
						<?php
							}
						?>
					</select>
					<label>Brand</label>
					<select id="brand">
						<?php
							foreach ($pro_result as $value) {
						?>
								<option value="<?php echo $value['Brand']; ?>">
									<?php 
										echo $value['Brand'];
									?>
								</option>
						<?php
							}
						?>
					</select>
					<label>Product Name</label>
					<select id="pname">
					</select>
					<label>Quantity</label>
					<input type="text" name="quantity">
					</br>
					<input type="submit" value="confirm"/>
			<?php
				}
			?>
		</form>
		<script type="text/javascript" src="../js/jquery-3.2.0.min.js"></script>
		<script type="text/javascript" src="../js/manage_storage.js"></script>
	</body>
</html>
