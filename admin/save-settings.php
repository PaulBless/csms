<?php
	session_start();
	include 'includes/conn.php';
	require_once '../includes/appsettings.php';

	

	if(isset($_POST['save-update'])){
        
		// clean inputs
        $id = $_POST['id'];
		$dname = trim(htmlspecialchars($_POST['dist_name']));
		$lname = trim(htmlspecialchars($_POST['dist_location']));
		$distname = ucwords($dname);
		$locname = ucwords($lname);	
        $logo = $_FILES['logo']['name'];
        
        if(!empty($logo)){
            move_uploaded_file($_FILES['logo']['tmp_name'], '../images/'.$logo);
            $save_file = $logo;	
            }else{
            $save_file = $app['logo'];
        }

        // check if record already exists in table
        $validate = mysqli_query($conn,"SELECT * FROM `settings` LIMIT 1") or die(mysqli_error($conn));
        if(mysqli_num_rows($validate) > 0){
            $get_details = mysqli_fetch_array($validate);
            $settings_id = $get_details['id'];
            $settings_logo = $get_details['logo'];
            // update record
            $sql = "UPDATE `settings` SET `name`='$distname', `location`='$locname', `logo`='$save_file' WHERE `id`='$settings_id' ";
            if($conn->query($sql)){
                $_SESSION['info'] = 'System settings updated.';
            }else{$_SESSION['error'] = $conn->error; }
        }else{
            // save record
            $sql = "INSERT INTO `settings` (`name`, `location`, `logo`) VALUES ('$distname', '$locname', '$save_file')";
            if($conn->query($sql)){
            $_SESSION['success'] = 'Settings successfully saved';
            }else{ $_SESSION['error'] = $conn->error; }
        }


       
        // if(isset($_POST['id'])){
        //     // result exist - update settings record
        //     $sql = "UPDATE `settings` SET `name`='$distname', `location`='$locname', `logo`='$save_file' WHERE `id`='$id' ";
        //     if($conn->query($sql)){
        //         $_SESSION['info'] = 'System settings updated.';
        //     }else{$_SESSION['error'] = $conn->error; }

        // }else{
        // // no result - insert system settings data
        //     $sql = "INSERT INTO `settings` (`name`, `location`, `logo`) VALUES ('$distname', '$locname', '$save_file')";
        //     if($conn->query($sql)){
        //     $_SESSION['success'] = 'Settings successfully saved';
        //     }else{ $_SESSION['error'] = $conn->error; }

        // }

		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: system-settings.php');

?>