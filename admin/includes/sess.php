<?php
	session_start();
	include 'includes/conn.php';

	## check if user logged_in
	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../index.php');
	}else{
		// get user details
		$sql = "SELECT * FROM `users` WHERE `uid` = '".$_SESSION['user']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
	}

	
?>