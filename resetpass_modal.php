<!-- change password -->
<div class="modal fade" id="resetpass">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header" style="color: #3c8dbc">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Change Password</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="change_password.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		   <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>  
                
                <div class="form-group">
                  	<label for="password" class="col-sm-3 control-label">New Password:</label>
                  	<div class="col-sm-9">
                    	<input type="password" class="form-control" id="new_password" name="new_password" value="<?php echo $user['password']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Retype Password</label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="new_password2" name="new_password2" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
              
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            	<button type="submit" class="btn btn-success btn-md btn-flat" name="change_pass"><i class="fa fa-check-square-o"></i> Submit</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- change password (end) -->