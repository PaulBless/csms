<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" >&times;</span></button>
              <h4 class="modal-title"><b>Add New Department</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="dept_add.php">
                <div class="form-group">
                    <label for="deptname" class="col-sm-4 control-label">Department name <span class="text-danger">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="deptname" name="deptname" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label" >Description</label>
                    <div class="col-sm-7">
                      <textarea type="text" class="form-control" id="description" name="description" placeholder="" ></textarea>
                    </div>
                </div>  
                <div class="form-group hidden">
                    <label for="subunit" class="col-sm-4 control-label">Sub Unit (if any) </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="subunit" name="subunit" placeholder="" >
                    </div>
                </div>
                

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Department</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="dept_edit.php">
                <input type="hidden" class="id" name="id" id="deptid">
                <div class="form-group">
                    <label for="edit_deptname" class="col-sm-3 control-label">Department name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_deptname" name="edit_deptname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_desc" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_desc" name="edit_desc">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-info btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="dept_delete.php">
                <input type="hidden" class="id" name="id" id="deptid">
                <div class="text-center">
                    <p>DELETE DEPARTMENT</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Description -->
<div class="modal fade" id="platform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Sub unit -->
<!-- Add -->
<div class="modal fade" id="addsub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Sub Category/Unit</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="subunit_add.php">
                  <div class="form-group">
                    <label for="description" class="col-sm-4 control-label" >Choose Department <span class="text-danger">*</span></label>
                    <div class="col-sm-7">
                        <select name="department" id="department" class="form-control" required>
                        
                        <option value="">Select</option>
                            <?php
                              $sql = "SELECT * FROM `departments` ORDER BY `dept_name` ASC";
                              $query = $conn->query($sql);
                              if(!empty($query)){
                              while($row = $query->fetch_assoc()){
                                echo "
                                  <option value='".$row['did']."'>".$row['dept_name']."</option>
                                ";
                                  }
                                }
                            ?>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="deptname" class="col-sm-4 control-label">Sub Unit name <span class="text-danger">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="subname" name="subname" placeholder="Enter sub unit" required>
                    </div>
                </div>
               

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="delete-sub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="subunit_delete.php">
                <input type="hidden" class="id" name="id" id="deptid">
                <div class="text-center">
                    <p>DELETE SUB UNIT</p>
                    <h3 class="bold fullname"></h3>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- View -->
<div class="modal fade" id="view-sub">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Sub Category List</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="">
                <input type="hidden" class="id" name="id" id="deptid">
                <div class="text-center">
                    <!-- <h3 class="bold unitname"></h3> -->
                    <table id="" class="table table-bordered table-hover">
                      <thead >
                        <th class="text-center">Department</th>
                        <th class="text-center">Sub Category</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody>
                      <?php 
                        include 'includes/conn.php';
                          // $sql = "SELECT * FROM `sub_category` ";
                          $sql = "SELECT *, departments.did AS id FROM `departments` LEFT JOIN `sub_category` ON `sub_category`.`dept_id`=`departments`.`did` ORDER BY `departments`.`dept_name` ASC";
                          $scquery = $conn->query($sql);
                          if($scquery ->num_rows > 0){
                            while($scrow = $scquery->fetch_assoc())
                            {
                          ?>
                        <tr>
                        <td><?php echo $scrow['dept_name']; ?></td>
                        <td><?php 
                          if(empty($scrow['sub_dept_name'])) echo "N/A"; else
                          echo $scrow['sub_dept_name']; 
                          ?></td>
                        <td>
                        <!-- <button type="submit" class="btn btn-danger btn-flat deletesub" id="<?php //echo $scrow['dept_id'] ?>" name="delete" data-id="<?php //echo $scrow['id'] ?>">Delete</button></td> -->
                        <?php if($scrow['sub_dept_name'] != ""): ?>
                        <a href="subunit_delete.php?id=<?php echo $scrow['sub_dept_name']; ?>" onclick="return confirm('sure you want to delete sub category: <?php echo htmlentities($scrow['sub_dept_name']) ?>?')" class="btn btn-danger btn-sm "> <span class="fa fa-trash"></span> Delete</a>                        </tr>
                              <?php else: ?>
                        <a href="#" title="no record found" onclick="return confirm('No record of sub category exist under <?php echo htmlentities($scrow['dept_name']) ?> department')" class="btn btn-warning btn-sm"> <span class="fa fa-lock"></span> Delete</a>
                      <?php endif; ?> 
                        <?php
                              }
                            }
                        ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- View Sub Unit - new -->
<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Sub Units List</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="">
                <?php 
                    include 'includes/conn.php';
                    $sql = "SELECT * FROM `departments`";
                    $query = $conn->query($sql);

                    if(!empty($query)){
                      while($row = $query->fetch_assoc()){
                        // $sql1 = "SELECT * FROM `sub_category` WHERE dept_id = '".$row['did']."'";
                        $sql1 = "SELECT * FROM `sub_category`";
                        $scquery = $conn->query($sql1);
                        // $scarray = [];
                        $scarray = array();
                        if(!empty($scquery)){
                          while($scrow = $scquery->fetch_assoc()){
                            $sub_unit = $scrow['sub_dept_name'];
                            // array_push($scarray, $scrow['sub_dept_name']);
                            array_push($scarray, $sub_unit);
                          }}
                          $scarray = json_encode($scarray);
                        }
                      }
                ?>
                <input type="hidden" class="id" name="id" id="deptid">
                  <div class="text-center">
                    
                     <h4 class="bold"> <?php  echo $scarray;?> </h4> 
                  </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>



     