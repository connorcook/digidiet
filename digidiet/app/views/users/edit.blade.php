@extends('layouts.content')

@section('content')
	@if (!Auth::check()) 
		{{ Redirect::to('/login'); }}
	@elseif(Auth::user()->id != $user->id)
		{{ Redirect::to('/user/'.Auth::user()->id.'/edit'); }}
	@endif

	<div class="span4 offset4 well">
	{{ Form::open(array('action' => array('UserController@update', $user->id), 'method'=>'put', 'files'=>true)); }}
	

	<!– name field –>
	<p>{{ Form::label('first_name', 'First Name'); }}</p>
	<p>{{ Form::text('first_name') }}</p>
	<p>{{ Form::label('last_name', 'Last Name'); }}</p>
	<p>{{ Form::text('last_name') }}</p>
	
	<!– password field –>
	<p>{{ Form::label('password', 'Password'); }}</p>
	<p>{{ Form::password('password'); }}</p>
	<p>{{ Form::label('password', 'Confirm Password'); }}</p>
	<p>{{ Form::password('confirm_password'); }}</p>

	<!– email field –>
	<p>{{ Form::label('email', 'Email'); }}</p>
	<p>{{ Form::text('email'); }}</p>
	<p>{{ Form::label('email', 'Confirm Email'); }}</p>
	<p>{{ Form::text('confirm_email'); }}</p>
	
	<!- avatar field ->
	<p>{{ Form::label('image', 'Avatar'); }}</p>
	<p>{{ Form::file('image'); }}</p>

	<!– location field –>
	<p>{{ Form::label('location', 'Location'); }}</p>
	<p>{{ Form::text('location', $user->location); }}</p>
	
	<!– about me field –>
	<p>{{ Form::label('about_me', 'About Me'); }}</p>
	<p>{{ Form::textarea('about_me', $user->about_me); }}</p>
	
	<!– submit button –>
	<p>{{ Form::submit('Edit Profile', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
	</div>
@endsection