<?php 
session_start();
require_once('includes/conn.php');

if(isset($_POST['reset']))
{
    // clean inputs from form
    $clean_mobileno_username = trim(htmlspecialchars($_POST['mobile_username']));
   
    // variable for form inputs
    $db_query_parameter = $clean_mobileno_username;

    // first check user details
    // $check = "SELECT * FROM `users` WHERE `username`='$db_query_parameter'";
    $check = "SELECT * FROM `users` WHERE `username`='$db_query_parameter' OR `mobileno`='$db_query_parameter'";
    $run = $conn->query($check);
    if($run->num_rows > 0)
    {
        echo "<script>alert('Please wait, processing request..')</script>";
        // now update password
        $new_password = "changeme"; // set new default password
        $pwd_encrypt = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `password`='$pwd_encrypt' WHERE `username`='$db_query_parameter' OR `mobileno`='$db_query_parameter'";
        if($conn->query($sql)){
         // show success message
        $msg = "Successfully.. Your New Password is : '$new_password'";
        $_SESSION['success'] = $msg;
        }
        else{
        $_SESSION['error'] = $conn->error;
        }
       
    }else{
        // $_SESSION['error'] = $conn->error;
        $_SESSION['error'] = 'The username you entered was not found or invalid';
    }

header('location: index.php');
}
?>