<?php
	include 'includes/sess.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$username =  trim(htmlspecialchars($_POST['username']));
		$mobileno =  trim(htmlspecialchars($_POST['mobileno']));
		$firstname = trim(htmlspecialchars($_POST['firstname']));
		$lastname =  trim(htmlspecialchars($_POST['lastname']));
		$user_fname =  ucfirst($firstname);
		$user_lname =  ucwords($lastname);
		$photo = $_FILES['photo']['name'];
		$selected_uid = $_POST['selected_id'];

		
		if(isset($_POST['username']) && isset($_POST['mobileno']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			// query update 
			$sql = "UPDATE `users` SET `firstname`='$user_fname', `lastname`='$user_lname', `username` = '$username', `mobileno` = '$mobileno', photo = '$filename' WHERE `uid` = '$selected_uid'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Error.. Please specify required fields';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>