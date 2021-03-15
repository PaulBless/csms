<?php
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['add']) && !empty($_POST['department'])){
        $name = trim(htmlspecialchars($_POST['subname']));
		$subdept_id = trim(htmlspecialchars($_POST['department']));
		$subdeptname = ucwords($name);
		
        //check if sub unit is alredy added
		$sql = "SELECT * FROM `sub_category` WHERE `dept_id`='$subdept_id' AND `sub_dept_name`='$subdeptname'";
		// if($conn->query($sql) == FALSE){ 
		if($conn->query($sql)->num_rows == 0){ 

		  // save sub-unit of dept
		  $query = "INSERT INTO `sub_category` (`dept_id`,`sub_dept_name`) VALUES ('$subdept_id','$subdeptname')";
		  if($conn->query($query))
		  {
            // show success message
			  $_SESSION['success'] = 'Sub unit added to this department';
		  }
         
		}
		else{
			$_SESSION['error'] = 'A sub unit with name: "'.$subdeptname.'" already added or exists';
		}

	}
	else{
		$_SESSION['error'] = 'Please, select the department and enter sub unit name ';
	}

	header('location: departments.php');
?>