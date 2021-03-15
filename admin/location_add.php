<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['add'])){
		$loc_name = trim(htmlspecialchars($_POST['loc_name']));
		$location_name = ucwords($loc_name);
		
		//check data exists
		$check = "SELECT * FROM `locations` WHERE `loc_name`='$location_name'";
		$run = $conn->query($check);
		// if($conn->query($check) == FALSE){
		if($run->num_rows == 0){
		$sql = "INSERT INTO `locations` (loc_name, created_on) VALUES ('$location_name', CURRENT_TIMESTAMP)";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New location added';
		}
		else{
			$_SESSION['error'] = $conn->error;
			}
		}else{ $_SESSION['error'] = 'Location with name: "'.$location_name.'" exists or already added';}
	}
	else{
		$_SESSION['error'] = 'Fill up form first';
	}

	header('location: locations.php');
?>