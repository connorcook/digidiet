@extends('layouts.content')

@section('content')
	<div class="login">
	{{ Form::open(array('url'=>'login', 'method'=>'post')); }}
	<!– check for login errors flash var –>
	@if (Session::has('login_errors'))
		<p>Your username or password was incorrect.</p>
	@endif

	<!– username field –>
		<h5>{{ Form::label('username', 'Username'); }}</h5>
		<p>{{ Form::text('username') }}</p>
	
	<!– password field –>
	<h5>{{ Form::label('password', 'Password'); }}</h5>
	<p>{{ Form::password('password'); }}</p>
	
	<!– submit button –>
	<p>{{ Form::submit('Login', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
	</div>
@endsection