<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['edit'])){
        // form data variables
		$etid = $_POST['id'];
		$name = trim(htmlspecialchars($_POST['edit_enqname']));
		$desc = trim(htmlspecialchars($_POST['edit_desc']));
		$enq_name =  ucfirst($name);
		$enq_desc = ucfirst($desc);

		$sql = "UPDATE `enquiry_type` SET `name` = '$enq_name', `comment` = '$enq_desc' WHERE `etid` = '$etid'";
		if($conn->query($sql)){
			$_SESSION['update'] = 'Service Type record updated';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location: enquiry-types.php');

?>