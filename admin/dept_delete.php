<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['delete'])){
		$did = $_POST['id'];
		$sql = "DELETE FROM `departments` WHERE `did` = '$did'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Department deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select the department record you want to delete first';
	}

	header('location: departments.php');
	
?>