<?php
	session_start(); // start session
	include 'includes/conn.php'; // db connection


	if(isset($_POST['add'])){
		// variables for form inputs / post data
		$fname =trim(htmlspecialchars($_POST['firstname'])) ;
		$lname = trim(htmlspecialchars($_POST['lastname']));
		$mobileno = trim(htmlspecialchars($_POST['mobile']));
		$user_type = trim(htmlspecialchars($_POST['usertype']));
		$new_status = "Active"; // status of new user account
        $firstname = ucfirst($fname); // uppercase firstname
        $lastname = ucfirst($lname); // uppercase lastname

		$filename = $_FILES['photo']['name']; // photo of user
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		//generate username: get first two chars of firstname and lastname, and join value
		$first_firstname_char = (substr($firstname, 0, 2));
		$first_lastname_char = (substr($lastname, 0, 2));
		$username = "@" .strtolower($fname);

		//generate random password
		$setpass = '0123456789';
		// $setpass = 'password';
		$random_pass = substr(str_shuffle($setpass), 0, 5);
		$password_encrypt = password_hash($random_pass, PASSWORD_DEFAULT); // hash password

		//query to check data exists
		$check = "SELECT * FROM `users` WHERE `firstname`='$fname' AND `lastname`='$lname'";
		$run = $conn->query($check);
		if($run->num_rows == 0)
		{
		  //query to save record
		  $sql = "INSERT INTO `users` (`firstname`, `lastname`, `mobileno`, `username`, `password`, `user_type`, `status`, `photo`, `created_on`) VALUES ('$firstname', '$lastname', '$mobileno', '$username', '$password_encrypt', '$user_type', '$new_status', '$filename', 'CURRENT_TIMESTAMP')";
		  if($conn->query($sql)){
			$msg = "New User added with the following login details:   Username: '$username' Password: '$random_pass'";
			$_SESSION['success'] = $msg;
			// $_SESSION['success'] = 'New User added successfully with login details..  Username: "'.$username.'" Password: "'.$random_pass.'"';
		  }
		  else{
			$_SESSION['error'] = $conn->error;
		  }
	  }else { $_SESSION['error'] = 'This user is already added!';}

	}
	else{
		$_SESSION['error'] = 'Fill up the form first';
	}

	header('location: userlist.php');
