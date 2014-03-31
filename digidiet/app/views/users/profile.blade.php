@extends('layouts.content')
@section('title')
	{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}
@endsection

@section('content')
	<h4>{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}</h4>
	<h5>Real name: {{ isset($user) ? $user->name : '' }}</h5>
	<hr class="alt1" />
	<h5>About</h5>
	<p> {{ isset($user) ? $user->about_me : 'The user with the specified ID was not found. Please contact an administrator.' }}</p>
@endsection