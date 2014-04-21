@extends('layouts.content')

@section('content')

	{{ Form::open(array('url'=> Request::url(), 'method'=>'post')); }}
	
	<!– check for validation errors–>
	@if($errors->count() > 0)
		<h3>Error(s)!</h3>
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

	<!– about me field –>
	<p>{{ Form::label('content', 'Post *'); }}</p>
	<p>{{ Form::textarea('content',null,array('placeholder'=>'Write your comment here.')); }}</p>

	<!- tags 			->
	<p>{{ Form::label('tags', 'Tags'); }}</p>
	<p>{{ Form::text('tags',null,array('placeholder'=>'tag your comment')); }}</p>
	<p>Fields marked with * are required.</p>
	<!– submit button –>
	<p>{{ Form::submit('Create Post', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
@endsection