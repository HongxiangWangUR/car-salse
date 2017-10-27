<?php
	if(isset($_POST["brand"])) {
		require_once 'db_setup.php';
		$result = NULL;
		$brand = $_POST["brand"];
		$return_array = array();
		$sql = "SELECT Product_name FROM Product WHERE Brand = '$brand'";
		$result = $conn->query($sql);
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $return_array[] = $row;
    	}
    	echo json_encode($return_array);
    	$result->close();
		$conn->close();
	}
?>