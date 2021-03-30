<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color: #3c8dbc">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Service Request</b></h4>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" id="add_enquiry" action="add-request.php" method="POST">
                  <?php require_once('includes/conn.php'); ?>
                    <input type="hidden" name="enquiryID" id="enquiryID" class="form-control" value="<?php echo mt_rand(1000,9999) ?>">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Firstname <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="firstname" name="firstname" required placeholder="Joe">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Lastname <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="lastname" name="lastname" required placeholder="Smith">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Mobile No.</label>
                        <div class="col-sm-7">
                        <input placeholder="0201234567" type="tel" class="form-control" pattern="[0][0-9]{9}" maxlength="10" id="mobile" name="mobileno"><span>(Optional, if any)</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-sm-3 control-label">Town / Location <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <select name="location_id" id="location" class="col-sm-9 form-control" required>
                            <?php 
                                $q =  "SELECT * FROM `locations` ORDER BY `loc_name` ASC";
                                $get = $conn->query($q);
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($town = $get->fetch_assoc())
                                {
                                 echo '<option value="'. $town['lid'].'">' .$town['loc_name'].'</option>';      
                                }
                              }else{ echo '<option>No record found</option>';}
                            ?>
                        </select>
                        </div>
                    </div>              


                    <div class="form-group">
                        <label for="enquiry_type" class="col-sm-3 control-label">Service Type <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                        <select name="enquirytype_id" id="enquiry_type" class="col-sm-9 form-control" required>
                            <?php 
                                $q =  "SELECT * FROM `enquiry_type` ORDER BY `name` ASC";
                                $get = ($conn->query($q));
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($data = $get->fetch_assoc())
                                {
                                 echo '<option value="'. $data['etid'].'">' .$data['name'].'</option>';      
                                }
                              }else{ echo '<option>No record found</option>';}
                            ?>
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_lastname" class="col-sm-3 control-label">Service Request Details <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                          <textarea name="enq_reason" id="enq_reason" class="form-control" cols="9" rows="2" required placeholder="Apply for business operating permit"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="department" class="col-sm-3 control-label">Department <span class="text-danger">*</span></label>
                        <div class="col-sm-7">
                            <select name="department_id" id="department" class="col-sm-9 department form-control" onChange="" required>
                            <?php 
                                $q =  "SELECT * FROM `departments` ORDER BY `dept_name` ASC";
                                $get = ($conn->query($q) );
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                while($data = $get->fetch_assoc())
                                {
                                 echo '<option value="'. $data['did'].'">' .$data['dept_name'].'</option>';      
                                }
                              }else{ echo '<option>No record found</option>';}
                            ?>
                        </select>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <label for="subcategory" class="col-sm-3 control-label">Sub Unit</label>
                        <div class="col-sm-7">
                          <select name="subcategory_id" id="subcategory" class="col-sm-9 form-control">
                            <?php 
                                $q =  "SELECT * FROM `sub_category` ORDER BY `sub_dept_name` ASC";
                                $get = ($conn->query($q));
                            ?>
                            <option value="" disabled selected hidden>Select here</option>
                            <?php
                              if(!empty($get))
                              {
                                echo '<option value="N/A">Not Applicable</option>';
                                while($data = mysqli_fetch_array($get))
                                {
                                 echo '<option value="'. $data['scid'].'">' .$data['sub_dept_name'].'</option>';      
                                }
                              }else{ echo '<option value="">No record found</option>';}
                            ?>
                          </select>
                        <span class="text-danger">(if any)</span>
                        </div>
                    </div>                  

            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Submit</button>
        </form>

            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color: #3c8dbc">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Service Request</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="">
                <input type="hidden" class="id" name="id" id="id">
                <div class="form-group">
                    <label for="edit_enqname" class="col-sm-3 control-label">Service Details / Reason</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_enqname" name="edit_enqname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_desc" class="col-sm-3 control-label">Date Created</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_date" name="edit_date" readonly>
                    </div>
                </div>
                
               <div class="form-group">
                    <label for="edit_desc" class="col-sm-3 control-label">Service ID</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_enqid" name="edit_enqid" readonly>
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
            <div class="modal-header" style="color: #3c8dbc">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="">
                <input type="hidden" class="id" name="id" id="id">
                <div class="text-center">
                <p>DELETE SERVICE REQUEST</p>
                    <h4 class="bold fullname text-danger"></h4>
                </div>
               <!-- <p>Sorry... This request can't be completed because all enquiries and service requests are archieved for future references and reports..</p>  -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>




     