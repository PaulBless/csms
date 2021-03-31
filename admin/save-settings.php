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

	if(isset($_POST['save'])){
		// clean inputs
        $id = $_POST['id'];
		$dname = trim(htmlspecialchars($_POST['dist_name']));
		$lname = trim(htmlspecialchars($_POST['dist_location']));
		$distname = ucfirst($lname);
		$locname = ucwords($dname);	
        $filename = $_FILES['logo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['logo']['tmp_name'], '../images/'.$filename);	
		}	

        if(!empty($id) && !isset($_POST['id'])){ // check if settings exists
            $_SESSION['error'] = 'No settings id found';
        }else{
            // insert new system settings data
            $sql = "INSERT INTO `settings` (`name`, `location`, `logo`) VALUES ('$distname', '$locname', '$filename')";
            if($conn->query($sql)){
             $_SESSION['success'] = 'Settings successfully saved';
            }
            else{
             $_SESSION['error'] = $conn->error;
            }	
        }
    
			
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>