<!--FXMM view from the index part of the link's control-->
<!DOCTYPE html>
<html>
<head>
    <title>CodeUpChallenge by Xavier Mercado</title>
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
<h1>All the Links</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Link</td>
            <td>Description</td>
            <td>UserID</td>
            <td>Rating</td>
			<td>+</td>
            <td>-</td>
			
        </tr>
    </thead>
    <tbody>
    @foreach($links as $id => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Description }}</td>
			<td>{{ $value->LinkURL }}</td>
            <td>{{ $value->USerID }}</td>
            <td>{{ $value->Rating }}</td>
	
@if (Auth::check())
       <!-- we will also add show, edit, and delete buttons -->
            <td>

              <!-- FXMM 03122015: Voting buttons-->
                <a class="btn btn-small btn-success" href="{{ URL::to('links/' .  $value->id. '/edit') }}">;)</a>
				
            </td>
			
			<td>
			    <a class="btn btn-small btn-danger" href="{{ URL::to('links/' . -$value->id. '/edit') }}">;)</a>
			</td>


          
@endif
     
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>