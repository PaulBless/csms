<?php
session_start();
require_once('includes/conn.php');

if (!empty($_POST["department_id"])) {
    
    $deptId = $_POST["department_id"];
    $q =  "SELECT * FROM `sub_category` WHERE `dept_id`='{$deptId}'";
    $get = $conn->query($q);
    $unitResult = $get->fetch_all();

    ?>
        
    <option value="" disabled selected hidden>Select</option>;
    <?php
    if(!empty($get)){
          foreach($unitResult as $unit)
             {
             echo '<option value="'. $data['scid'].'">' .$data['sub_dept_name'].'</option>';      
               }
    }else{ echo '<option>N/A</option>';}
        
}else{ echo "choose department first";}

?>