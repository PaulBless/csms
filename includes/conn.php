<?php
	$conn = new mysqli('127.0.0.1', 'root', '', 'clientservices_db');

	if ($conn->connect_error) {
	    die("Connection to MySQL Server failed: " . $conn->connect_error);
	}
	
?>