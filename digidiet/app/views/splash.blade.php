@extends('layouts.standard')

@section('content')
     <h3>Working Title Recipes</h3>
     <em>Just another reason to love cooking. Coming soon.</em>

     {{ Form::open(array('url'=>'search', 'method'=>'post')); }}
     <!- search box field ->
     <p>{{ Form::label('Recipe', 'Recipe Search'); }}</p>
     <p>{{ Form::text('search') }}</p>

     <!– search button –>
     <p>{{ Form::submit('Search', array('class' => 'btn-large')); }}</p>
     {{ Form::close(); }}

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
     @foreach($recipes as $recipe)
     	<h2>{{ 	$recipe->recipe_name }} </h2>
     	<p>	{{ 	$recipe->recipe_body }} </p>
     @endforeach
@stop
