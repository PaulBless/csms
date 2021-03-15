<?php

    session_start();
	include 'includes/conn.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM `locations` WHERE `lid` = '$id'";
		if($conn->query($sql)){
			$_SESSION['warning'] = 'Location deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select record to delete first';
	}

	header('location: locations.php');
	
?>