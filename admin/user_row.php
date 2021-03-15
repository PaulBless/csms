<?php 
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['id'])){
		$userid = $_POST['id'];
		$sql = "SELECT * FROM `users` WHERE `uid` = '$userid'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row); // encode data into json format
	}
?>