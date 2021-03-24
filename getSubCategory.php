<?php
session_start();
require_once("includes/conn.php");
//get department id
$department_id = ($_REQUEST["department_id"] <> "") ? trim($_REQUEST["department_id"]) : "";
// $department_id = ($_POST["department_id"]);
if ($department_id <> "") {
    $sql = "SELECT * FROM `sub_category` WHERE `dept_id` = :dept_id ORDER BY `sub_dept_name` ASC";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":dept_id", trim($department_id));
        $stmt->execute();
        $results = $stmt->fetchAll();
    } catch (Exception $ex) {
        echo($ex->getMessage());
    }
    if (count($results) > 0) {
        ?>
        <label>State: 
            <select name="state">
                <option value="">Please Select</option>
                <?php foreach ($results as $rs) { ?>
                    <option value="<?php echo $rs["scid"]; ?>"><?php echo $rs["sub_dept_name"]; ?></option>
                <?php } ?>
            </select>
        </label>
        <?php
    }else{ echo '<option value="N/A">N/A</option>';}
} else{ "<script>alert('select dept first')</script>";}
?>