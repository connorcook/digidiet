@extends('layouts.content')
@section('title')
	{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}
@endsection

@section('content')
	@if(isset($user))
		<h4>{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}</h4>
		<h5>{{ isset($user) ? $user->name : '' }}</h5>
		<img src="http://placehold.it/150x150/{{substr(md5(rand()), 0, 6);}}
			/ffffff.png&text={{$user->username}}" width="150" height="150" />
		<hr class="alt1" />
		<h5>About</h5>
		<p> {{ isset($user) ? $user->about_me : 'The user with the specified ID was not found. Please contact an administrator.' }}</p>
	@else
		<p>User not found.</p>
	@endif
@endsection