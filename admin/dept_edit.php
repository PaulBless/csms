<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['edit'])){
        // form data variables
		$did = $_POST['id'];
		$dname =trim($_POST['edit_deptname']);
		$desc = trim($_POST['edit_desc']);
		$dept_name = ucwords($dname);
		$dept_desc = ucfirst($desc);

		$sql = "UPDATE `departments` SET `dept_name` = '$dept_name', `description` = '$dept_desc' WHERE `did` = '$did'";
		if($conn->query($sql)){
			$_SESSION['update'] = 'Department record updated';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location: departments.php');

?>