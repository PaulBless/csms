<?php 
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['id']) && !empty($_POST['id'])){
		$did = $_POST['id'];
		$sql = "SELECT * FROM `departments` WHERE `did` = '$did'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);	// pass results to json format
	}
?>