@extends('layouts.standard')


@section('content')
<h1> Users List Page </h1>

	@foreach($users as $user)
    <h2>{{ 	$user->username }} </h2>
    <p>	{{ 	$user->name }} </p>
    @endforeach
@stop