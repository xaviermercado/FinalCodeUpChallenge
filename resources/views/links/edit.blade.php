<!DOCTYPE html>
<html>
    <head>
	
        <title>User's Login</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>

<div class="container-fluid">
	<div class="row">
        
	<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
	<div class="panel-heading">Login</div>
	<div class="panel-body">
			         
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-horizontal" role="form" method="POST" action="/auth/login">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label class="col-md-4 control-label">E-Mail Address</label>
<div class="col-md-6">
<input type="email" class="form-control" name="email" value="{{ old('email') }}">
</div>
</div>


<div class="form-group">
<label class="col-md-4 control-label">Password</label>
<div class="col-md-6">
<input type="password" class="form-control" name="password">
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<div class="checkbox">
<label>
<input type="checkbox" name="remember"> Remember Me
</label>
</div>
</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
	<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
		Login
	</button>

<a href="/password/email">Forgot Your Password?</a>
</div>
</div>
</form>
</div>
</div>
</div>

</div>
</div>