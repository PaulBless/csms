<?php
    session_start();
	include('includes/conn.php');
   
    $id = $_GET['id'];
    $sql = "DELETE FROM `sub_category` WHERE `sub_dept_name` = '$id'";
	
    if($conn->query($sql)){
		$_SESSION['warning'] = 'Sub category deleted ';
	}
	else{
	    $_SESSION['error'] = $conn->error;
	}

    header('location: departments.php');


   	// $id=$_GET['id'];
	// $result = $conn->prepare("DELETE FROM `sub_category` WHERE dept_id= :memid");
	// $result->bindParam(':memid', $id);
	// $result->execute();
?>