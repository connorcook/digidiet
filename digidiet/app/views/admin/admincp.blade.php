@extends('layouts.content')

<!--
Names the title of the Control Panel
-->
@section('title')
	Administrator's Control Panel
@stop

@section('content')

<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

	<!-- ANGULAR -->
	<!-- all angular resources will be loaded from the /public folder -->
		<script src="js/filter.js"></script>
		<script src="js/controllers/userCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/userService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->


	<h3>Admin Control Panel</h3>
	<div style="display: inline-block">
	@include('admin.usermgmt')
	</div>
	<div style="display: inline-block">
	@include('admin.postmgmt')
	</div>
	<!-- 
	<table>
	<thead>
		<tr><th>UserName</th><th>Role</th><th>Flags</th></tr></thead>
	<tbody data-bind="foreach: users">
	<tr>
		<td data-bind="text: name"></td>
		<td data-bind="text: roles"></td>
		<td data-bind="text: flags"></td>
	</tr>
	</tbody>
	
	</table> -->
	

@endsection



