<?php
	//include 'includes/session.php';
	include 'includes/conn.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'homepage.php';
	}

    $userid = "";
    if(isset($_SESSION['user']))
        $userid = $_SESSION['user'];

	if(isset($_POST['save'])){
		$username = $_POST['username'];
		$mobile = $_POST['mobile'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];		
    
		$sql = "UPDATE `users` SET firstname = '$firstname', lastname = '$lastname', `mobile` = '$mobile', `username` = '$username' WHERE `uid` = '$userid'";
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