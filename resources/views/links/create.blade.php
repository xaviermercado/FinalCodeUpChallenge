<!DOCTYPE html>
<html>
<head>
    <title>Link Creation</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
@if (Auth::check())
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('links') }}">Links Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('links') }}">View All Links</a></li>
        <li><a href="{{ URL::to('links/create') }}">Create a Links</a>
		<li><a href="{{ URL::to('auth/logout') }}">Logout User</a>
    </ul>
</nav>	   
@else

	<div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('links') }}">Links Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('auth/register') }}">Register User</a></li>
        <li><a href="{{ URL::to('auth/login') }}">Login User</a>
    </ul>

@endif

<h1>Create a Link</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::open(array('url' => 'links')) !!}

    <div class="form-group">
      
        {!!Form::hidden('UserID', Auth::id(), array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('LinkURL', 'LinkURL') !!}
        {!!Form::text('LinkURL', Input::old('LinkURL'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Description', 'Description') !!}
        {!! Form::text('Description', Input::old('Description'), array('class' => 'form-control')) !!}
    </div>

   

    {!! Form::submit('Create the Link!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>