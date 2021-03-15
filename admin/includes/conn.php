<?php
	$conn = new mysqli('localhost', 'root', '', 'clientservices_db');

	if ($conn->connect_error) {
	    die("Connection to Server failed: " . $conn->connect_error);
	}
	
?>