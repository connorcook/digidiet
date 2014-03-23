@extends('layouts.standard')

@section('content')
	<div class="span4 offset4 well">
	{{ Form::open(array('url'=>'register', 'method'=>'post')); }}
	<!– check for login errors flash var –>
	@if (Session::has('register_errors'))
		<p>The information provided was not valid. Please try again.</p>
	@endif

	<!– username field –>
	<p>{{ Form::label('username', 'Username'); }}</p>
	<p>{{ Form::text('username') }}</p>
	<p>{{ Form::label('first_name', 'First Name'); }}</p>
	<p>{{ Form::text('first_name') }}</p>
	<p>{{ Form::label('last_name', 'Last Name'); }}</p>
	<p>{{ Form::text('last_name') }}</p>
	
	<!– password field –>
	<p>{{ Form::label('password', 'Password'); }}</p>
	<p>{{ Form::password('password'); }}</p>
	<p>{{ Form::label('password', 'Confirm Password'); }}</p>
	<p>{{ Form::password('confirm_password'); }}</p>

	<!– about me field –>
	<p>{{ Form::label('about_me', 'About Me'); }}</p>
	<p>{{ Form::textarea('about_me'); }}</p>
	
	<!– submit button –>
	<p>{{ Form::submit('Create Account', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
	</div>
@endsection