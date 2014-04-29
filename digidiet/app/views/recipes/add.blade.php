@extends('layouts.content')

@section('title')
	Recipes
@stop

@section('content')
	
	{{ Form::open(array('url'=>'recipe', 'method'=>'post', 'files'=>true)); }}
	<h1> Add Recipes Page </h1>
	
	<!- check for validation errors ->
	@if($errors->count() > 0)
		<h3>Error(s)!</h3>
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif

	<!– title field –>
	<p>{{ Form::label('title', 'Title *'); }}</p>
	<p>{{ Form::text('title',null,array('placeholder'=>'Enter a title...')) }}</p>

	<!– description field –>
	<p>{{ Form::label('description', 'Description *'); }}</p>
	<p>{{ Form::text('description',null,array('placeholder'=>'Enter a description...')); }}</p>

	<p>{{ Form::label('image_url', 'Picture'); }}</p>
	<p>{{ Form::file('image_url'); }}</p>

	<!– ingredients field –>
	<p>{{ Form::label('ingredients', 'Ingredients *'); }}</p>
	<p>{{ Form::text('ingredients',null,array('placeholder'=>'Enter the ingredients...')); }}</p>

	<!– instructions field –>
	<p>{{ Form::label('instructions', 'Instructions *'); }}</p>
	<p>{{ Form::text('instructions',null,array('placeholder'=>'Enter the instructions...')); }}</p>

	<p>Fields marked * are required.</p>
	<p>{{ Form::submit('Add Recipe', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
@endsection