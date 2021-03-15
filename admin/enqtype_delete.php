<?php
    session_start();
	include 'includes/conn.php';
	// require_once('includes/conn.php');

	if(isset($_POST['delete'])){
		$etid = $_POST['id'];
		$sql = "DELETE FROM `enquiry_type` WHERE `etid` = '$etid'";
		if($conn->query($sql)){
			$_SESSION['warning'] = 'Service Type deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select the record you want to delete first';
	}

	header('location: enquiry-types.php');
	
?>