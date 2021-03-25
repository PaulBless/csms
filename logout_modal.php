<!-- Config -->
<div class="modal fade" id="logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color: #3c8dbc">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Logout Confirmation</b></h4>
            </div>
            <div class="modal-body">
              <div class="text-center">
                
                <form class="form-horizontal" method="POST" action="logout.php">
                    <div class="row">
                        <label for="title" class="text center control-label">Are you sure you want to logout your session? Click the "Yes" button to continue..</label>
                    </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-danger btn-flat" name="logout"> Yes, Logout</button>
              </form>
            </div>
        </div>
    </div>
</div>