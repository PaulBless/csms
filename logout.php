<?php
	
	if(isset($_POST['logout']))
	{
		session_start(); // start session
		session_destroy();	// destroy session

		header('location: index.php'); // redirect to index page
	}
	
?>