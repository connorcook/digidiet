@extends('layouts.standard')

@section('title')
	Home
@stop

@section('content')
	<h3>Digidiet</h3>
	<em>Recipes and more from the finest culinary enthusiasts in the world!</em>
	<!-- Slideshow -->
	<!--
	<ul class="slideshow">
		<li><img src="http://placehold.it/500x350/4D99E0/ffffff.png&text=550x350" /></li>
		<li><img src="http://placehold.it/500x350/75CC00/ffffff.png&text=550x350" /></li>
		<li><img src="http://placehold.it/500x350/E49800/ffffff.png&text=550x350" /></li>
	</ul>
	-->

     <img src="images/makecake.jpg"/>

     <!--{{ Form::open(array('url'=>'search', 'method'=>'post')); }}
     <!- search box field ->
     <p>{{ Form::label('Recipe', 'Recipe Search'); }}</p>
     <p>{{ Form::text('search') }}</p>

     <!– search button –>
     <p>{{ Form::submit('Search', array('class' => 'btn-large')); }}</p>
     {{ Form::close(); }}-->

@stop

@section('subcontent1')
	<h4>What's Hot</h4>
    <ol>
	@foreach(DB::table('recipes')->orderBy('created_at', 'desc')->take(5)->get() as $recipe)
     	<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
    @endforeach
    </ol>
@stop

@section('subcontent2')
	<h4>Newest</h4>
  	<ol>
	@foreach(DB::table('recipes')->orderBy('created_at', 'asc')->take(5)->get() as $recipe)
     	<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
    @endforeach
    </ol>
@stop

@section('subcontent3')
	<h4>Top Rated</h4>
    <ol>
	@foreach($recipes as $recipe)
     	<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
    @endforeach
    </ol>
@stop

@section('subcontent4')
	<h4>New Users</h4>
    <ol>
	@foreach(DB::table('users')->orderBy('created_at', 'desc')->take(5)->get() as $user)
     	<li><p><a href="/user/{{ $user->id }}">{{ $user->username }}</a></p></li>
    @endforeach
    </ol>
@stop
