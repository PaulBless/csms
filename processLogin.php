<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$userid = $_POST['userid'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `users` WHERE `username` = '$userid'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Invalid username or does not exists!'; // wrong username
		}
		else{
			// username exists/correct, now check the password
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['user'] = $row['uid'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['mobile'] = $row['mobileno'];
				$_SESSION['user_fullname'] = $row['firstname'] . ' '. $row['lastname'];
				$_SESSION['user_photo'] = $row['photo'];
				$_SESSION['user_password'] = $row['password'];
				$_SESSION['user_username'] = $row['username'];
				$_SESSION['user_type'] = $row['user_type'];
				$_SESSION['user_status'] = $row['status'];
				$_SESSION['user_regdate'] = $row['created_on'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password, please check..'; // wrong password
			}

			// valid password, check user type
            if($row['user_type'] == "Admin") // validate user role
            {
                header('location: admin/home.php');
            }elseif ($row['user_type'] == 'User'){ 
				header('location: homepage.php');
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input user credentials first';
	}

	header('location: index.php');

?>