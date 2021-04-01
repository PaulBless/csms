<?php
	//include 'includes/session.php';
	session_start();
	include 'includes/conn.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'homepage.php';
	}

	
	if(isset($_POST['change_pass'])){
		// clean inputs
		$current_pwd = ($_POST['curr_password']);
		$new_pwd = trim(htmlspecialchars($_POST['new_password']));
		$new_pwd2 = trim(htmlspecialchars($_POST['new_password2']));
		$users_id = ($_POST['userid']);
		$users_pass = ($_POST['upass']);

        
        if(password_verify($current_pwd, $users_pass))
        {                
            // hash the password
            $hash_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);

                $sql = "UPDATE `users` SET `password` = '$hash_pwd' WHERE `uid` = '$users_id'";
                if($conn->query($sql)){
                    // $msg = 'Password change successfully. You must login again';
                    // echo "<script>alert('".$msg."'); window.location.href='index.php'</script>";
                    $_SESSION['success'] = 'Password successfully changed, you must login again. New Password : '.$new_pwd.'';
                }
                else{
                        $_SESSION['error'] = $conn->error;
                }        

	    }
        else{
            $_SESSION['error'] = 'your current password is incorrect';
            }
    }
        
	header('location:'.$return);
    
?>