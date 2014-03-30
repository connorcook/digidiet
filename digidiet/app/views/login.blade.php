@extends('layouts.content')

@section('content')
	<div class="span4 offset4 well">
	{{ Form::open(array('url'=>'login', 'method'=>'post')); }}
	<!– check for login errors flash var –>
	@if (Session::has('login_errors'))
		<p>Your username or password was incorrect.</p>
	@endif

	<!– username field –>
		<p>{{ Form::label('username', 'Username'); }}</p>
		<p>{{ Form::text('username') }}</p>
	
	<!– password field –>
	<p>{{ Form::label('password', 'Password'); }}</p>
	<p>{{ Form::password('password'); }}</p>
	
	<!– submit button –>
	<p>{{ Form::submit('Login', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
	</div>
@endsection