<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE `users` SET `photo` = '$filename' WHERE `uid` = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Photo successfully updated ';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select user to update photo first';
	}

	header('location: userlist.php');
?>