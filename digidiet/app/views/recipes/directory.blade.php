@extends('layouts.content')

@section('title')
	Recipes
@stop

@section('content')
	<h1> Recipes Directory </h1>
	<div class="grid">
	@foreach($recipes as $recipe)
		<a href="/recipe/{{$recipe->id}}">
		<h6>{{$recipe -> title}}</h6> </a>
	@endforeach
	</div>
	<p>{{ $recipes->links(); }}</p>
@endsection