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
		<p>{{$recipe -> description}}</p>
	@endforeach
	</div>
	<div id="navmenu"><p>{{ $recipes->links(); }}</p></div>
@endsection