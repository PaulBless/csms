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

	// get logged user id
    $userid = "";
    if(isset($_SESSION['user']))
        $userid = $_SESSION['user'];
        $sql = "SELECT `password` FROM `users` WHERE `uid`=$userid";
        $run = mysqli_query($conn, $sql);
        $user_password = mysqli_fetch_assoc($run);

	if(isset($_POST['change_pass'])){
		// clean inputs
		$current_pwd = trim(htmlspecialchars($_POST['curr_password']));
		$new_pwd = trim(htmlspecialchars($_POST['new_password']));
		$new_pwd2 = trim(htmlspecialchars($_POST['new_password2']));
		$users_id = trim(htmlspecialchars($_POST['userid']));

        
        if(password_verify($_POST['curr_password'], $user_password['password']))
        {                
            // hash the password
            $hash_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);

                $sql = "UPDATE `users` SET `password` = '$hash_pwd' WHERE `uid` = '$userid'";
                if($conn->query($sql)){
                    $msg = 'Password change successfully. You will be required to login again';
                    echo "<script>alert('$msg'); window.location.href='index.php'</script>";
                }
                else{
                        $_SESSION['error'] = $conn->error;
                }        

	    }
        else{
            // echo "<script>alert('incorrect current password')</script>";
            $_SESSION['error'] = 'your current password incorrect';
            }
    }
        
	header('location:'.$return);
    
?>