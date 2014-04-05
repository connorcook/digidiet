@extends('layouts.content')
@section('title')
	{{ isset($recipe) ? $recipe->title : 'Recipe not found.' }}
@endsection

@section('content')

	@if( isset($recipe) )
		<h3> {{ $recipe -> title}} </h3><br>
		
		<h4> By: {{$user -> username}}</h4>
		<h4> Description: </h4>
		<p> {{ $recipe -> description }} </p>

		<h4> Ingredients: </h4>
		<p> {{ $recipe -> ingredients }} </p>
		<h4> Instructions: </h4>
		<p> {{ $recipe -> instructions }} </p>
	@else
		<p> Recipe not found. </p>
	@endif
@endsection