<?php 
    session_start();
	include 'includes/conn.php';
	// require_once('includes/conn.php');

	if(isset($_POST['id']) && !empty($_POST['id'])){
		$etid = $_POST['id'];
		$sql = "SELECT * FROM `enquiry_type` WHERE `etid` = '$etid'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);	// pass results to json format
	}
?>