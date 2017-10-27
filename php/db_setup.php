<?php
	$host = "127.0.0.1";
	$user = "root";
	$pwd = "1234";
	$db = "dbmilestone4";

	// Create connection
	$conn = new mysqli($host, $user, $pwd, $db);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	// echo "success";
?>
