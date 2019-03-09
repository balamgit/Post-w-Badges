@extends('base_layouts.app')

@section('content')
    @include('modals.add')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">
        <br/>
        <div class="card">
            <div class="card-header">
                <h3 class="box-title" style="display: inline;">Table</h3>
                <a href="#" title="add new training data" data-toggle="modal" data-target="#IdAddModal" style="padding-left: 20px;"><i class="fa fa-plus fa-lg"></i></a>
                <a href="#" title="Edit data" id="IdThrowEdit" style="padding-left: 20px;"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                <a href="#" title="Delete selected row" id="IdThrowDelete" class="pull-right" style="padding-right: 30px;"><i class="fa fa-trash-o fa-lg"></i></a>


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



             } );
         </script>
    @endsection