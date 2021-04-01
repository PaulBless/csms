<!-- change password -->
<div class="modal fade" id="resetpass">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header" style="color: #3c8dbc">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"> Change Your Password</h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="change_password.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" >
          		   <input type="hidden" name="userid" id="userid" value="<?php echo $user['uid'] ?>">
          		   <input type="hidden" name="upass" id="upass" value="<?php echo $user['password'] ?>">

					 <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password" required>
                    </div>
                	</div>  
                
					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">New Password:</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="new_password" name="new_password" placeholder="input new password" required>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-3 control-label">Retype Password</label>
						<div class="col-sm-7"> 
						<input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="retype new password" required>
						</div>
					</div>
              
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            	<button type="submit" class="btn btn-warning btn-md btn-flat change-pwd" name="change_pass"><i class="fa fa-check-square-o"></i> Submit</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- change password (end) -->