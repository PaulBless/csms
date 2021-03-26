<?php
	//include 'includes/session.php';
	session_start();
	include 'includes/conn.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'homepage.php';
	}

	// get logged user id
    $userid = "";
    if(isset($_SESSION['user']))
        $userid = $_SESSION['user'];

	if(isset($_POST['save'])){
		// clean inputs
		$fname = trim(htmlspecialchars($_POST['firstname']));
		$lname = trim(htmlspecialchars($_POST['lastname']));
		$username = trim(htmlspecialchars($_POST['username']));
		$mobile = trim(htmlspecialchars($_POST['mobile']));
		$user_type = trim(htmlspecialchars($_POST['type']));
		$firstname = ucfirst($fname);
		$lastname = ucwords($lname);		
    
		$sql = "UPDATE `users` SET firstname = '$firstname', lastname = '$lastname', `mobileno` = '$mobile', `username` = '$username' WHERE `uid` = '$userid'";
		if($conn->query($sql)){
				$_SESSION['success'] = 'Profile updated successfully';
		}
		else{
				$_SESSION['error'] = $conn->error;
		}		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>