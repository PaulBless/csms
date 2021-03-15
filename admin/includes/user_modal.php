<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="user_add.php" enctype="multipart/form-data">
               <!-- firstname -->
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <!-- lastname -->
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>   
                <!-- mobile number -->
                <div class="form-group">
                    <label for="mobile" class="col-sm-3 control-label">Mobile No. <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0][0-9]{9}" maxlength="10" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="usertype" class="col-sm-3 control-label">User Type <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="form-control" id="usertype" name="usertype" required>
                        <option value="">Select</option>
                        <option value="Admin">System Admin</option>
                        <option value="User">Normal User</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>
                    <div class="col-sm-8">
                      <input type="file" id="photo" name="photo">
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
              <h4 class="modal-title"><b>Edit User Profile</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="user_edit.php" enctype="">
                <input type="hidden" class="id" name="id" id="userid">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_firstname" name="edit_firstname" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_lastname" name="edit_lastname" required>
                    </div>
                </div>  
                
                <div class="form-group">
                    <label for="edit_mobile" class="col-sm-3 control-label">Mobile No.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_mobile" name="edit_mobile" required>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="edit_username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="edit_username" name="edit_username" required disabled>
                    </div>
                </div>

                <div class="form-group hidden">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="edit_password" name="edit_password" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_usertype" class="col-sm-3 control-label">User Type <span class="text-danger">*</span> </label>
                    <div class="col-sm-8">
                      <select class="form-control" id="edit_usertype" name="edit_usertype" required>
                        <option value="">Select</option>
                        <option value="Admin">System Admin</option>
                        <option value="User">Normal User</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_status" class="col-sm-3 control-label">User Status <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="form-control" id="edit_status" name="edit_status" required>
                        <option value="">Select</option>
                        <option value="Locked">Locked</option>
                        <option value="Active">Active</option>
                      </select>
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
              <form class="form-horizontal" method="POST" action="user_delete.php">
                <input type="hidden" class="id" name="id" id="userid">
                <div class="text-center">
                    <p>DELETE USER</p>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="candidates_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Photo</label>
                    <div class="col-sm-8">
                      <input type="file" id="photo" name="photo" required>
                      <!-- <input type="file" class="custom-file-input" id="customFile" name="photo" onchange="displayImg(this,$(this))" required> -->
                    </div>
                    <!-- <img src="" alt="pic" class="col-sm-2 img-fluid" height="50" width="50" style="border-radius: 50%;"> -->
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-warning btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>




     