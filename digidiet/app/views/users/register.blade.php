@extends('layouts.content')

@section('content')
	<div class="span4 offset4 well">
	{{ Form::open(array('url'=>'register', 'method'=>'post', 'files'=>true)); }}
	<!– check for registration errors –>
	@if($errors->count() > 0)
		<h4>Error(s)!</h4>
		<ul>
			@foreach($errors->all() as $err )
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

	<!– username field –>
	<p>{{ Form::label('username', 'Username *'); }}</p>
	<p>{{ Form::text('username', null, array('placeholder'=>'Enter a username...')) }}</p>

	<p>{{ Form::label('first_name', 'First Name *'); }}</p>
	<p>{{ Form::text('first_name',null, array('placeholder'=>'Enter your first name...')) }}</p>

	<p>{{ Form::label('last_name', 'Last Name'); }}</p>
	<p>{{ Form::text('last_name',null, array('placeholder'=>'Enter your last name...')) }}</p>
	
	<!– password field –>
	<p>{{ Form::label('password', 'Password *'); }}</p>
	<p>{{ Form::password('password',array('placeholder'=>'Must be 8+ characters...')); }}</p>

	<p>{{ Form::label('password_confirmation', 'Confirm Password *'); }}</p>
	<p>{{ Form::password('password_confirmation',array('placeholder'=>'Re-enter password')); }}</p>

	<!– email field –>
	<p>{{ Form::label('email', 'Email *'); }}</p>
	<p>{{ Form::text('email',null, array('placeholder'=>'What\'s your e-mail?')); }}</p>

	<p>{{ Form::label('email_confirmation', 'Confirm Email *'); }}</p>
	<p>{{ Form::text('email_confirmation',null, array('placeholder'=>'Re-enter your e-mail.')); }}</p>
	
	<!- avatar field ->
	<p>{{ Form::label('image', 'Avatar'); }}</p>
	<p>{{ Form::file('image'); }}</p>

	<!– location field –>
	<p>{{ Form::label('location', 'Location'); }}</p>
	<p>{{ Form::text('location',null, array('placeholder'=>'Where are you?')); }}</p>
	
	<!– about me field –>
	<p>{{ Form::label('about_me', 'About Me'); }}</p>
	<p>{{ Form::textarea('about_me',null, array('placeholder'=>'Tell us about yourself.')); }}</p>
	
	<p> * indicates a required field </p>
	<!– submit button –>
	<p>{{ Form::submit('Create Account', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
	</div>
@endsection