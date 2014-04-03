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
     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
     Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<p>

     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
     sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
     Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<p>

     {{ Form::open(array('url'=>'search', 'method'=>'post')); }}
     <!- search box field ->
     <p>{{ Form::label('Recipe', 'Recipe Search'); }}</p>
     <p>{{ Form::text('search') }}</p>

     <!– search button –>
     <p>{{ Form::submit('Search', array('class' => 'btn-large')); }}</p>
     {{ Form::close(); }}

@stop

@section('subcontent1')
	<h4>What's Hot</h4>
	<li>
	@foreach($recipes as $recipe)
     	<p><a href="/recipes/{{ $recipe->id }}">{{ $recipe->recipe_name }}</a></p>
    @endforeach
    </li>
@stop

@section('subcontent2')
	<h4>Newest</h4>
  	<li>
	@foreach($recipes as $recipe)
     	<p><a href="/recipes/{{ $recipe->id }}">{{ $recipe->recipe_name }}</a></p>
    @endforeach
    </li>
@stop

@section('subcontent3')
	<h4>Top Rated</h4>
  	<li>
	@foreach($recipes as $recipe)
     	<p><a href="/recipes/{{ $recipe->id }}">{{ $recipe->recipe_name }}</a></p>
    @endforeach
    </li>
@stop

@section('subcontent4')
	<h4>Up and Coming</h4>
  	<li>
	@foreach($recipes as $recipe)
     	<p><a href="/recipes/{{ $recipe->id }}">{{ $recipe->recipe_name }}</a></p>
    @endforeach
    </li>
@stop
