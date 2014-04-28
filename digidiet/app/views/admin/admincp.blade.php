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
		<script src="js/controllers/postCtrl.js"></script>
		<script src="js/services/userService.js"></script> <!-- load our service -->
		<script src="js/services/postService.js"></script> <!-- load our service -->
		<script src="js/app.js"></script> <!-- load our application -->
<link rel="stylesheet" href="/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<div ng-app="userApp" ng-controller="userController">
	
	<h3>Admin Control Panel</h3>
	<div class="grid">
	<div class="col_6">
	@include('admin.usermgmt')
	</div>
	<div class="col_6">
	@include('admin.postmgmt')
	</div>
</div>

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



