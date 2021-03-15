<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Service Type</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="enqtype_add.php">
                <div class="form-group">
                    <label for="enqname" class="col-sm-4 control-label">Service Type name <span class="text-danger">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="enqname" name="enqname" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label" >Description</label>
                    <div class="col-sm-7">
                      <textarea type="text" class="form-control" id="description" name="description" placeholder="" ></textarea>
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
              <h4 class="modal-title"><b>Edit Service Type</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="enqtype_edit.php">
                <input type="hidden" class="id" name="id" id="enqid">
                <div class="form-group">
                    <label for="edit_enqname" class="col-sm-3 control-label">Service Type name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="edit_enqname" name="edit_enqname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_desc" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-7">
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
              <form class="form-horizontal" method="POST" action="enqtype_delete.php">
                <input type="hidden" class="id" name="id" id="enqid">
                <div class="text-center">
                    <p>DELETE Service Type</p>
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




     