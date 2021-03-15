<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['edit'])){
		// define varialbes for post method
		$id = $_POST['id'];
		$fname = trim(htmlspecialchars($_POST['edit_firstname'])) ;
		$lname = trim(htmlspecialchars($_POST['edit_lastname'])) ;
		$num = trim(htmlspecialchars($_POST['edit_mobile'])) ;
		//$uname = trim(htmlspecialchars($_POST['edit_username'])) ;
		$utype = trim(htmlspecialchars($_POST['edit_usertype'])) ;
		$status = trim(htmlspecialchars($_POST['edit_status'])) ;
		$firstname = ucfirst($fname);
		$lastname = ucfirst($lname);

		// update query
		$sql = "UPDATE `users` SET `firstname` = '$firstname', `lastname`='$lastname', `mobileno`='$num', `user_type`='$utype', `status`='$status' WHERE `uid` = '$id'";
		if($conn->query($sql)){
			$_SESSION['update'] = 'User details updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location: userlist.php');

?>