@extends('layouts.content')

<!--
Names the title of the layout Users
-->
@section('title')
	Users
@stop

<!--
Displays a "User Directory" at the top,
followed by a paginated list of all users
of the site
-->
@section('content')
	<h3>User Directory</h3>
	<div class="grid">
	@foreach($users as $user)
		<a href="/user/{{$user->id}}">
		<img class="caption" title="{{$user->username}}" 
			src="http://placehold.it/150x150/{{substr(md5(rand()), 0, 6);}}
			/ffffff.png&text={{$user->username}}" width="150" height="150" />
		</a>
	@endforeach
	</div>
	<div id=navmenu>{{ $users->links(); }}</div>
@endsection