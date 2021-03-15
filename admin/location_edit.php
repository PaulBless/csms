<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['edit'])){
		// define varialbes for post method
		$id = $_POST['id'];
		$name = trim(htmlspecialchars($_POST['edit_locname'])) ;
		$newlocname = ucwords($name);

		// update query
		$sql = "UPDATE `locations` SET `loc_name` = '$newlocname' WHERE `lid` = '$id'";
		if($conn->query($sql)){
			$_SESSION['update'] = 'Location details updated';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location: locations.php');

?>