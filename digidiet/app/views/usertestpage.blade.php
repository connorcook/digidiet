@extends('layouts.standard')

@section('title')
	User Directory
@stop

@section('content')
<h3>User Directory</h3>

	@foreach($users as $user)
    <h4>{{ 	$user->username }} </h4>
    <p>	{{ 	$user->name }} </p>
    @endforeach
@stop