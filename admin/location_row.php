<?php 
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['id']) && !empty($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM `locations` WHERE lid = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>