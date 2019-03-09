<div class="modal fade" id="IdAddModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-gray-light">
                <h4 class="modal-title">Add training dataset </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form id="IdAddForm" action="/dataset/input" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                      <label>Tag*</label><br/>
                      <input type="text" class="form-control" name="tags" required>
                    </div>
                    <div class="form-group">
                        <label>KeyWords*</label><br/>
                        <input type="text" class="form-control" name="keywords" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Comment:</label>
                        <textarea class="form-control" name="contents" rows="5" id="content"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->