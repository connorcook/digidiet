@extends('layouts.standard')


@section('content')
<h3> Users List Page </h3>

	@foreach($users as $user)
    <h4>{{ 	$user->username }} </h4>
    <p>	{{ 	$user->name }} </p>
    @endforeach
@stop