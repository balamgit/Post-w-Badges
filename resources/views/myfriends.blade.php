@extends('base_layouts.app2')

@section('content')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container">
      <!--main-row-->
        <div class="row">

            <!--form & feed column-->
            <div class="col-7 mt-3 mx-auto">

                <strong class="m-2">My Friends!</strong>
                @foreach($users as $user)
                    <div class="shadow-lg p-2 mt-2 bg-white rounded">
                        <p>
                            <img src="{{asset('storage/wishes.jpg')}}" class="rounded-circle shadow-lg" width="35px" alt="DP">
                            {{$user->user}}
                            <small class="float-right" style="color: lightskyblue;"><a href="#">View profile</a> </small>
                        </p>

                    </div>
                    @endforeach
            </div>
            <!--/.form & feed column-->

      </div>
        <!--/.main-row-->
    </div>
    <!--/.container-->
    @endsection

@section('scripts')
         <script>
             $(document).ready(function() {
                $('#IdPost').on('submit',function (e) {
                 e.preventDefault();
                    $.ajax({
                        url: "/dashboard",
                        type: 'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(result)
                        {
                            $('#IdMyResults').html(result);
                            $('#IdAlertModal').modal('show');
                        }
                    });//ajax
                });
                //end of posts ajax

                 $('#IdRefreshClick').click(function () {
                     $(location).attr('href','{{route(\Illuminate\Support\Facades\Route::currentRouteName())}}')
                 });

             } );
         </script>
    @endsection
