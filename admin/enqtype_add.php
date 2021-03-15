<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['add'])){
        $dname = trim(htmlspecialchars($_POST['enqname']));
        $desc = trim(htmlspecialchars($_POST['description']));
		$enqname = ucfirst($dname);
		$description = ucfirst($desc) ;
		
		$check = "SELECT * FROM `enquiry_type` WHERE `name`='$enqname'";
		$run = $conn->query($check);
		if($run->num_rows == 0){
		$sql = "INSERT INTO `enquiry_type` (`name`, `comment`) VALUES ('$enqname', '$description')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'New Service Type added';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}else{ $_SESSION['error'] = 'This service type is already added or exists';}

	}
	else{
		$_SESSION['error'] = 'Please, specify Service Type name first';
	}

	header('location: enquiry-types.php');
?>