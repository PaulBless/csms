<?php
session_start();
require_once('includes/conn.php');

if(isset($_POST["department_id"]) && !empty($_POST['department_id']))
{
   // Capture selected department
    $departmentid = $_POST["department_id"];
    // $departmentid = $_GET["department_id"];
     
    // Get list of units or sub-category 
    $query = "SELECT * FROM `sub_category` WHERE `dept_id` ='$departmentid'";
    $stmt = $conn->query($query);
    // $unitResults = $stmt->fetch_assoc();
    $unitResults = $stmt->fetch_all();
    // $unitResults = $stmt->fetch_array();
     
    // Display city dropdown based on department name
    // if($departmentid !== 'Select here'){
   ?>
    <option value="">Select</option>
      <?php
      // if(!empty($unitResults)){
      foreach($unitResults as $subunit){
          ?>
          <option value="<?php echo $subunit['scid'] ?>"><?php echo $subunit['sub_dept_name']?></option>
          <?php
        } 
      // }
      //   else{ echo '<option value="N/A">N/A</option>'; } 
} 

?>