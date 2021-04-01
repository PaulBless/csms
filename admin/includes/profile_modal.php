<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header" style="color: #3c8dbc">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b> Profile Settings</b></h4>
          	</div>
          	<div class="modal-body">
  
              <form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <h5 class="text-warning text-center"><b>Account Details</b></h5>
                <input type="hidden" name="selected_id" id="selected_id" value="<?php echo $user['uid'] ?>">
                <input type="hidden" name="user-password" id="user-password" value="<?php echo $user['password'] ?>">
                <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Username</label>
                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>
               
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>
                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>
                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>
                
                <div class="form-group">
                  	<label for="mobile" class="col-sm-3 control-label">Mobile #</label>
                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" pattern="[0][0-9]{9}" maxlength="10" id="mobileno" name="mobileno" value="<?php echo $user['mobileno']; ?>" placeholder="0201234567">
                  	</div>
                </div>

                <div class="form-group ">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>
                    <div class="col-sm-7">
                      <input type="file" id="photo" name="photo" accept=".jpg, .png, .jpeg, .bmp |image/*">
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-save"></i> Save Changes</button>
                </div>
              </form> <!-- end user details form -->
             
             <hr>
             <!-- Password settings  -->
              <form class="form-horizontal" method="POST" action="reset-password.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>">
                  <h5 class="text-warning text-center" style="margin-bottom: 20px;"><b> Change Your Password</b></h5>
                  
                  <input type="hidden" name="user-id" id="user-id" value="<?php echo $user['uid'] ?>">
                  <input type="hidden" name="user-password" id="user-password" value="<?php echo $user['password'] ?>">
                
                  <div class="form-group">
                      <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="enter current password" required>
                      </div>
                  </div> 
                  
                  <div class="form-group">
                      <label for="curr_password" class="col-sm-3 control-label">New Password:</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="enter new password" required>
                      </div>
                  </div> 
                  <div class="form-group">
                      <label for="curr_password" class="col-sm-3 control-label">Confirm Password:</label>
                      <div class="col-sm-7">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm new password" required>
                        <small id="pass_match" data-status=''></small>
                      </div>
                  </div>

                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-danger btn-md btn-flat change-pwd" name="change-pwd">Reset Password</button>
                  </div>
              </form> <!-- change password form <end> -->

            </div>

          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          	</div>
        </div>
    </div>
</div>

