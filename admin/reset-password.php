<?php
	include 'includes/conn.php';
	include 'includes/sess.php';
    
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['change-pwd'])){
		$curr_password = ($_POST['curr_password']) ;
		$password = trim(htmlspecialchars($_POST['new_password']));
		$confirm_pwd = trim(htmlspecialchars($_POST['confirm_password']));
		$stored_pwd = ($_POST['user-password']);
		$selected_uid = ($_POST['user-id']);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if(password_verify($curr_password, $stored_pwd)){

            // run update query
             $sql = "UPDATE `users` SET `password` = '$hashed_password' WHERE `uid` = '$selected_uid'";
            if($conn->query($sql)){
                $_SESSION['success'] = 'Password successfully changed, you are required to login again. New Password : '.$password.'';
                // $msg = "Password successfully changed.\\nYour new password is : '".$password."'\\n\\nYou will be required to login again..";
                // echo "<script>alert('".$msg."');window.location='session-restart.php';</script>";
            }
            else{
                $_SESSION['error'] = $conn->error;
            }
                
		}else{
			$_SESSION['error'] = 'current password is incorrect';
		}
    }
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

header('location:'.$return);
?>