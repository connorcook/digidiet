@extends('layouts.content')
@section('title')
	{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}
@endsection

@section('content')
	@if(isset($user))
		<h4>{{ isset($user) ? $user->username."'s Profile" : 'User not found.' }}</h4>
		<h5>{{ isset($user) ? $user->name : '' }}</h5>
		<img src="http://placehold.it/150x150/{{substr(md5(rand()), 0, 6);}}
			/ffffff.png&text={{$user->username}}" width="150" height="150" />
		<hr class="alt1" />
		<h5>About</h5>
		<p> {{ isset($user) ? $user->about_me : 'The user with the specified ID was not found. Please contact an administrator.' }}</p>
		<hr class="alt2" />
		<h5>{{ $user->username }}'s Recipes</h5>
		<ul>
		@foreach(DB::table('recipes')->where('author_id', '=', $user->id)->orderBy('created_at', 'desc')->get() as $recipe)
			<li><p><a href="/recipe/{{ $recipe->id }}">{{ $recipe->title }}</a></p></li>
		@endforeach
		</ul>
		<hr class="alt1" />
		<h5>Most Recent Comments</h5>
		@foreach(DB::table('posts')->where('author_id', '=', $user->id)->get() as $post)
			<h4>{{Recipe::find($post->parent_id)->title}}</h4>
			<p>{{$post->content}}</p>
			<a href="{{'/'.$post->parent_type.'/'.$post->parent_id.'#'.$post->id}}"><p>Read More</p></a>
			<hr class="alt2" />
		@endforeach

		@if(Auth::check() && Auth::user()->id == $user->id)
			<b><p><a href="/user/{{Auth::user()->id}}/edit">Edit Your Profile</a></p></b>
		@endif
	@else
		<p>User not found.</p>
	@endif
@endsection