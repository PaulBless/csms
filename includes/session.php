<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_SESSION['user'])){
		$sql = "SELECT * FROM `users` WHERE `uid` = '".$_SESSION['user']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
		
				
	}
	else{
		header('location: index.php');
		exit();
	}

?>