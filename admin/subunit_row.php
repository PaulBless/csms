<?php 
    session_start();
	include 'includes/conn.php';

	if(isset($_POST['id']) && !empty($_POST['id'])){
		$did = $_POST['id'];
		$sql = "SELECT * FROM `sub_category` WHERE `dept_id` = '$did'";
		$query = $conn->query($sql);
        $row = $query->fetch_assoc();
        
		echo json_encode($row);	// pass results to json format
	}
?>

<?php 
    // session_start();
	// include 'includes/conn.php';

	// if(isset($_POST['id']) && !empty($_POST['id'])){
	// 	$did = $_POST['id'];
	// 	$sql = "SELECT * FROM `sub_category` WHERE `dept_id` = '$did'";
	// 	$query = $conn->query($sql);
    //     $unitarray = array();
    //     if(!empty($query)){
    //         while($res = $query->fetch_assoc()){
    //             array_push($unitarray, $res['sub_dept_name']);
    //         }
    //         $unitarray = json_encode($unitarray); // return json
    //     }

    //    echo $unitarray;
	// }
?>