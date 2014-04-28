@extends('layouts.content')

@section('title')
	Recipes
@stop

@section('content')
	<h3> Recipes Directory </h3>
	@foreach($recipes as $recipe)
	<div class = "item">	
		<a href="/recipe/{{$recipe->id}}">
		<h4>{{$recipe -> title}}</h6> </a>
		<hr class="alt2" />
		<p>{{$recipe -> description}}</p>
	</div>
	@endforeach
	<hr class="alt1" />
	<div id="navmenu"><h6>{{ $recipes->links(); }}</h6></div>
@endsection