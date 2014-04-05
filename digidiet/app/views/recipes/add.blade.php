@extends('layouts.content')

@section('title')
	Recipes
@stop

@section('content')
	
	{{ Form::open(array('url'=>'recipe', 'method'=>'post')); }}
	<h1> Add Recipes Page </h1>

	<!– title field –>
	<p>{{ Form::label('title', 'Title'); }}</p>
	<p>{{ Form::text('title') }}</p>

	<!– description field –>
	<p>{{ Form::label('description', 'Description'); }}</p>
	<p>{{ Form::text('description'); }}</p>

	<!– ingredients field –>
	<p>{{ Form::label('ingredients', 'Ingredients'); }}</p>
	<p>{{ Form::text('ingredients'); }}</p>

	<!– instructions field –>
	<p>{{ Form::label('instructions', 'Instructions'); }}</p>
	<p>{{ Form::text('instructions'); }}</p>

	<p>{{ Form::submit('Add Recipe', array('class' => 'btn-large')); }}</p>
	{{ Form::close(); }}
@endsection