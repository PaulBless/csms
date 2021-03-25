<!-- Edit profile -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header" style="color: #3c8dbc">

            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>User Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		 
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="mobile" class="col-sm-3 control-label">Mobile No</label>
                  	<div class="col-sm-9">
                    	<input type="tel" class="form-control" pattern="" maxlength="10" id="mobile" name="mobile" value="<?php echo $_SESSION['mobile']; ?>">
                  	</div>
                </div>
                <hr>

                <div class="form-group ">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9"> 
                      <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['password']; ?>">
                    </div>
                </div>

                <div class="form-group ">
                    <label for="type" class="col-sm-3 control-label">User Type:</label>
                    <div class="col-sm-9">
                      <input type="text" id="type" name="type" class="form-control" value="<?php echo $_SESSION['user_type']; ?>" disabled>
                    </div>
                </div>
                <hr>
           
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Update </button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- End profile -->

