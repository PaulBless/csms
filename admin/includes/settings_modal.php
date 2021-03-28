<!-- change password -->
<div class="modal fade" id="settings">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header" style="color: #3c8dbc">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>System Settings</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="settings.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" >
          		   <?php require_once('../includes/appsettings.php') ?>
                     <input type="text" name="id" id="id" class="form-control hidden" value="<?php if(!empty($app['id'])) echo $app['id']; ?>">

					 <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name of District:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="dist_name" name="dist_name" placeholder="enter district name" value="<?php if(!empty($app['name'])) echo $app['name']; ?>" required>
                    </div>
                	</div>  
                
					<div class="form-group">
						<label for="location" class="col-sm-3 control-label">Location:</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="dist_location" name="dist_location" placeholder="enter district location or town" value="<?php if(!empty($app['location'])) echo $app['location']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="logo" class="col-sm-3 control-label">Logo:</label>
						<div class="col-sm-7"> 
						<input type="file" class="form-control" id="logo" name="logo" required>
						</div>
					</div>
              
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            	<button type="submit" class="btn btn-primary btn-md btn-flat settings" name="save"> Save Settings</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- change password (end) -->