@extends('base_layouts.app')

@section('content')
    <!--row for porduct table-->
    <div class="container-fluid">
        <br/>
        <div class="card col-md-7 m-4">
            <div class="card-header">
                <h3 class="box-title" style="display: inline;">Upload the source dataset: <br/><small>(extracted from Social networks acceptable formats JSON )</small></h3>
            </div>
            <form action="/source/output" method="POST" enctype="multipart/form-data">
               {{csrf_field()}}
            <!-- /.box-header -->
            <div class="card-body">
             <div class="form-group">
                 <label>Select The trained dataset:</label>
                 <select class="form-control" name="trained">
                     @foreach($data as $dat)
                   <option value="{{$dat->id}}">RUMOR DATASET{{'->'.$dat->id}}</option>
                     @endforeach
                 </select>
             </div><br/><br/>

                <div class="form-group">
                    <label>Upload the extracted JSON file :</label><br/>
                    <input type="file" name="file">
                </div><br/>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-success pl-4 pr-4">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--/.row-->
    @endsection

@section('scripts')
         <script>
             $(document).ready(function() {




             } );
         </script>
    @endsection