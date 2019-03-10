<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Market</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="hold-transition login-page">
@if(session()->has('err_msg'))
    <div class="col-md-7  col-sm-offset-2  ">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>{{ session()->get('err_msg')}}</h4>
        </div>
    </div>
@endif
<div class="login-box">
    <div class="login-logo">
        <b>scrootit!</b>

    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form role="form" action="/login" method="POST">
            {{csrf_field()}}
            {{method_field('POST')}}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="user" placeholder="user name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="pull-left col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>