<?php
session_start();
require_once('includes/conn.php');

if(isset($_POST["dept_id"]) && !empty($_POST['dept_id']))
{
    // Capture selected department
    $departmentid = $_POST["dept_id"];
     
    ?>
    <select name="department" id="department" class="form-control" required>
                        
    <option value="" disabled selected hidden>Select</option>
        <?php
        
          $sql = "SELECT * FROM `departments` WHERE did='$departmentid' ";
          $query = $conn->query($sql);
          if(!empty($query)){
          while($row = $query->fetch_assoc()){
            echo "
              <option value='".$row['did']."'>".$row['dept_name']."</option>
            ";
              }
            }else{ echo "<option>No Record</option>";}
        ?>
    </select>
    <?php 
   
}

?>