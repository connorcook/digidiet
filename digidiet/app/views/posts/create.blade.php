@extends('layouts.content')

@section('content')

	{{ Form::open(array('url'=> Request::url(), 'method'=>'post')); }}
	<!– check for login errors flash var –>
	@if (Session::has('post_errors'))
		<p>The post was not valid. Please try again.</p>
	@endif
	
	<!– about me field –>
	<p>{{ Form::label('content', 'Post'); }}</p>
	<p>{{ Form::textarea('content'); }}</p>

	<!- tags 			->
	<p>{{ Form::label('tags', 'Tags'); }}</p>
	<p>{{ Form::text('tags'); }}</p>
	
	<!– submit button –>
	<p>{{ Form::submit('Create Post', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
@endsection