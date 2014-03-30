@extends('layouts.standard')

@section('content')
     <h3>Working Title Recipes</h3>
     <em>Just another reason to love cooking. Coming soon.</em>

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