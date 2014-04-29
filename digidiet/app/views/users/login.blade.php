@extends('layouts.content')

@section('content')
	<div class="span4 offset4 well">
	
		<!– check for login errors flash var –>
		@if (Session::has('ban'))
			<div class="notice error">
				<i class="icon-remove-sign icon-large"></i> 
				<b>Unfortunately, your account has been banned. <br>Please check your email, or contact an administrator for help.</b>
				<a href="#close" class="icon-remove"></a>
			</div>
		@elseif(Session::has('login_errors'))
			<div class="notice warning">
				<i class="icon-warning-sign icon-large"></i> 
				Your username/password was incorrect.
				<a href="#close" class="icon-remove"></a>
			</div>
		@endif

		<div class="center">
		{{ Form::open(array('url'=>'login', 'method'=>'post')); }}

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
	</div>
@endsection