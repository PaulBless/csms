<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_SESSION['user'])){
		$sql = "SELECT * FROM `users` WHERE `uid` = '".$_SESSION['user']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
		// get log user details
		// $logname =	$user['lastname'] .' '. $user['firstname'];
		// $logphoto =	$user['photo'];
		// $logregdate = date('M, Y', strtotime($user['created_on']));
	}
	else{
		header('location: index.php');
		exit();
	}

?>