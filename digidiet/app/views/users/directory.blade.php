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
	<h3 style="text-align:center">User Directory</h3>
	@foreach($users as $user)
	<div class = "col_3" style="text-align:center">
		<a href="/user/{{$user->id}}">
		
		<img class="caption" title="{{$user->name}}" src="http://placehold.it/150x150/{{substr(md5(rand()), 0, 6);}}
			/ffffff.png&text={{$user->username}}" width="150" height="150" />
		</a>
	</div>
	@endforeach
	<hr />
	<div id="navmenu" ><h6>{{ $users->links(); }}</h6></div>
	<hr />
@endsection