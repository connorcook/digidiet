
<h4>Post Management</h4>
	<h5>Flagged Posts</h5>
	<table class="striped tight sortable">
	<thead>
	<!--table headers-->
		<tr><th>User</th><th>Post</th><th>Time Flagged</th><th>Delete</th></tr>
	</thead>
	<tbody>
			<tr ng-repeat="flag in flags">
		<td><% flag.user.username %></td>
		<td> <div class="tooltip" title="hi" data-action="click"><% flag.post.content %></button></td>
		
		<td><% flag.updated_at %></td>
		<td><a href="#" ng-click="delFlag(flag.id, flag.post.id, $index)" class="text-muted"><img src="/images/ban.png" style="height: 10px"></a></td>
		</tr>
	</tbody>
	</table>


