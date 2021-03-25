<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$userid = $_POST['userid'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `users` WHERE `username` = '$userid'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Invalid username, or does not exists!';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['user'] = $row['uid'];
				
			}
			else{
				$_SESSION['error'] = 'Incorrect password, retry!';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input user credentials first';
	}

	header('location: index.php');

?>