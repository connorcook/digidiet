@extends('layouts.content')

<!--
Names the title of the Control Panel
-->
@section('title')
	Administrator's Control Panel
@stop

@section('content')

<!-- JS -->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/angular.min.js"></script> <!-- load angular -->
	<script src="/js/angular-animate.min.js"></script>
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



