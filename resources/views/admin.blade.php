@extends('base_layouts.app2')

@section('content')
    @include('modals.add')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">
        <br/>
        <h3>RUMORS DETECTION <small>using neural networks with probability mathematics</small></h3>
        <div class="card">
            <div class="card-header">
                <h3 class="box-title" style="display: inline;">Training Dataset</h3>
                <a href="#" title="add new training data" data-toggle="modal" data-target="#IdAddModal" style="padding-left: 20px;"><i class="fa fa-plus fa-lg"></i></a>
                <a href="#" class="float-right" id="deleteopen"  title="Delete selected" style="padding-right: 20px;padding-left: 20px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>

            </div>
            <!-- /.box-header -->
            <div class="card-body">
                <table id="IdDataTable" class="table table-bordered table-striped text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th>R_data_no</th>
                        <th>Tags</th>
                        <th>KeyWords</th>
                        <th>Contents</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $dat)
                      <tr>
                          <td>{{$dat->id}}</td>
                          <td>{{$dat->tags}}</td>
                          <td>{{$dat->keywords}}</td>
                          <td>{{$dat->contents}}</td>
                      </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.row-->
    @endsection

@section('scripts')
         <script>
             $(document).ready(function() {
                 var table= $('#IdDataTable').DataTable({
                     stateSave: true,
                     "scrollX": true,
                     select: true,
                 });
                 //table initialztn end
                 function getids(){
                     var ids =[];
                     $.map(table.rows('.selected').data(), function (item) {
                         ids.push(item[0]);
                     });
                     //console.log(ids);
                     return ids;
                 }

                 $('#deleteopen').click(function (e) {
                    e.preventDefault();
                     var id=getids();
                     $('#DeleteId').val(id);
                     if(id.length===1){
                         $('#IdDeleteModal').modal('show');
                     }
                     else {
                         alert('select any one row');
                     }
                 });

                 $('#IdDeleteForm').on('submit',function (e) {
                     e.preventDefault();
                         $.ajax({
                             url:'/admin',
                             type:'POST',
                             data:new FormData(this),
                             contentType:false,
                             processData:false,
                             success:function(result)
                             {
                                 $('#IdMyResults').html(result);
                                 $('#IdDeleteModal').modal('hide');
                                 $('#IdAlertModal').modal('show');
                             }
                         });
                 });

                 $('#IdRefreshClick').click(function () {
                     $(location).attr('href','{{route(\Illuminate\Support\Facades\Route::currentRouteName())}}')
                 });



             } );
         </script>
    @endsection
