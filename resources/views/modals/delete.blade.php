<div class="modal fade" id="IdDeleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are sure to delete selected data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form id="IdDeleteForm" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="ids" id="DeleteId" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger float-left">yes sure!</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">-No-</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
