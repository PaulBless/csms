<?php

    session_start();
	include 'includes/conn.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM `users` WHERE `uid` = '$id'";
		if($conn->query($sql)){
			$_SESSION['warning'] = 'User deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select record to delete first';
	}

	header('location: userlist.php');
	
?>