@extends('layouts.content')

<!--
Displays user's profile title in the form of "<Username>'s Profile"
-->
@section('title')
	{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}
@endsection

<!--
Displays user-specific content, such as a picture, a user description
(About Me), a list of recipes the user has posted, recent comments
the user has made, and a link for editing the user's profile
-->
@section('content')
	@if(isset($user))
		<h4>{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}</h3>
		<div class="item">
		{{HTML::image($user->avatar, null, array('width' => '250', 'height'=>250))}}
		</div>
		<h4>Real name</h4>
		<div class="item">{{ isset($user) ? $user->name : '' }}</div>
		
		<h4>About</h4>
		<div class="item">
		<p> {{ isset($user) ? $user->about_me : 'The user with the specified ID was not found. Please contact an administrator.' }}</p>
		</div>

		<h4>Statistics</h4>
		<div class="item">
		<table cellspacing="0" cellpadding="0">
			<thead><tr>
				<th> </th>
				<th> </th>
			</tr></thead>
			<tbody><tr>
				<th>Recipes Created</th>
				<td>{{count(DB::table('recipes')->where('author_id', '=', $user->id)->get())}}</td>
			</tr><tr>
				<th>Comments</th>
				<td>{{count(DB::table('posts')->where('author_id', '=', $user->id)->get())}}</td>
			</tr><tr>
				<th>Recipes Rated</th>
				<td>{{count(DB::table('rating')->where('user_id', '=', $user->id)->get())}}</td>
			</tr></tbody>
			</table>
		</div>

		<h4>Newest Recipes</h4>
		<div class="item">
		<ul>
		@foreach(DB::table('recipes')->where('author_id', '=', $user->id)->orderBy('created_at', 'desc')->get() as $recipe)
			<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a> 
		@if(Auth::check() && Auth::user()->id == $user->id)	
			    {{ Form::open(array('route' => array('recipe.destroy', $recipe->id), 'method' => 'delete')) }}
       			 <button type="submit" href="{{ URL::route('recipe.destroy', $recipe->id) }}" class="btn btn-danger btn-mini">Delete</button>
    			{{ Form::close() }}
		@endif	
			</p></li>
		@endforeach
		</ul>
		</div>

		<h4>Newest Comments</h4>
		<div class="item">
		@foreach(DB::table('posts')->where('author_id', '=', $user->id)->get() as $post)
			<h4>{{Recipe::find($post->parent_id)->title}}</h4>
			<p>{{$post->content}}</p>
			<a href="{{'/'.$post->parent_type.'/'.$post->parent_id.'#'.$post->id}}"><p>Read More</p></a>
			@if(Auth::check() && Auth::user()->id == $user->id)	
			    {{ Form::open(array('route' => array('post.destroy', $post->id), 'method' => 'delete')) }}
        <button type="submit" href="{{ URL::route('post.destroy', $post->id) }}" class="btn btn-danger btn-mini">Delete</button>
    {{ Form::close() }}
		@endif
			
		@endforeach
		</div>
		
		@if(Auth::check() && Auth::user()->id == $user->id)
			<b><p><a href="/user/{{Auth::user()->id}}/edit">Edit Your Profile</a></p></b>
		@endif
		<hr class="alt1" />
	@else
		<p>User not found.</p>
	@endif
@endsection