@extends('layouts.content')

@section('title')
	Users
@stop

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
	{{ $users->links(); }}
@endsection