<?php
	// session_start();
	include 'includes/conn.php';

	$sql = "SELECT * FROM `settings`";
	$query = $conn->query($sql);
	$app = $query->fetch_assoc();

	

?>