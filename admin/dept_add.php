<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['add'])){
        $dname = trim(htmlspecialchars($_POST['deptname']));
        $desc = trim(htmlspecialchars($_POST['description']));
		$sub = trim(htmlspecialchars($_POST['subunit']));
		$deptname = ucwords($dname);
		$description = ucfirst($desc) ;
		$subunit = ucfirst($sub) ;
		
		$check = "SELECT * FROM `departments` WHERE `dept_name`='$deptname'";
		$run = $conn->query($check);
		// if($conn->query($check) == FALSE){
		if($run->num_rows == 0){
			$sql = "INSERT INTO `departments` (`dept_name`, `description`, `created_on`) VALUES ('$deptname', '$description',NULL)";
			if($conn->query($sql) == TRUE){ // if department added
			$_SESSION['success'] = 'Department added sucessfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		} else { $_SESSION['error'] = 'Department with name: "'.$deptname.'" already added or exists';}

	}
	else{
		$_SESSION['error'] = 'Please, specify department name first';
	}

	header('location: departments.php');
?>