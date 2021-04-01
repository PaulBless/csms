<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color: #3c8dbc">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Location</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="location_add.php" enctype="">
                <div class="form-group">
                    <label for="locname" class="col-sm-3 control-label">Location name:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="location_name" name="loc_name" autofocus required>
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
            <div class="modal-header" style="color: #3c8dbc">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Location</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="location_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_location" class="col-sm-3 control-label">Location name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_location" name="edit_locname">
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
              <h4 class="modal-title"><b>Confirm Delete</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="location_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE LOCATION?</p>
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




     