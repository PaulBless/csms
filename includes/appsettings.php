<?php
	session_start();
	include 'includes/conn.php';

	$sql = "SELECT * FROM `settings`";
	$query = $conn->query($sql);
	$app = $query->fetch_assoc();
	// get log user details
	// $logname =	$user['lastname'] .' '. $user['firstname'];
	// $logphoto =	$user['photo'];
	// $logregdate = date('M, Y', strtotime($user['created_on']));
	

?>