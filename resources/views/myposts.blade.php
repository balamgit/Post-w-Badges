@extends('base_layouts.app2')

@section('content')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container">
      <!--main-row-->
        <div class="row">

            <!--form & feed column-->
            <div class="col-7 mt-3 mx-auto">
                <!--write post-->
               <form id="IdPost" method="POST">
                   {{csrf_field()}}
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5>Write a post & share with your friends!</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Enter a suitable title" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" cols="3" rows="3" name="contents" placeholder="Place some contents for your post" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success float-right">Post</button>
                        </div>
                    </div>
                </div>
               </form>
                <!--/.write post-->

                <strong class="m-2">My Timeline!</strong>
                @foreach($posts as $post)
                    <div class="shadow-lg p-2 mt-2 bg-white rounded">
                        <p>
                            <img src="{{asset('storage/wishes.jpg')}}" class="rounded-circle shadow-lg" width="35px" alt="DP">
                            {{$post->user}}
                            <small class="float-right" style="color: lightskyblue;">posted at 24th jan 2019, 02:05PM </small>
                        </p>
                        <p class="bg-light-gradient p-2 rounded">
                            <strong>{{$post->title}}</strong><br/>
                             {{$post->contents}}
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
