@extends('layouts.content')

@section('title')
	Recipes
@stop

@section('content')
	<h1> Recipes Directory </h1>
	@foreach($recipes as $recipe)
		<a href="/recipe/{{$recipe->id}}">
		<h6>{{$recipe -> title}}</h6> </a>
	@endforeach

@endsection