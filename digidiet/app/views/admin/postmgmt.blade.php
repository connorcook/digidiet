
<h4>Post Management</h4>
	<h5>Flagged Posts</h5>
	<table class="striped tight sortable">
	<thead>
	<!--table headers-->
		<tr><th>Author</th><th>Type</th><th>Post</th><th>Time Flagged</th><th>Delete</th></tr>
	</thead>
	<tbody>
		<tr ng-repeat="flag in flags">
		<td ng-if="flag.post_type=='comment'"><% flag.post.user.username %></td>
		<td ng-if="flag.post_type=='recipe'"><% flag.recipe.user.username %></td>
		<td><% flag.post_type %></td>
		<td ng-if="flag.post_type=='comment'"><% flag.post.content %></td>
		<td ng-if="flag.post_type=='recipe'"><% flag.recipe.title %></td>
		<td><% flag.updated_at %></td>
		<td><a href="#" ng-click="delFlag(flag.id, flag.post_type, flag.post_id, $index)" class="text-muted"><img src="/images/ban.png" style="height: 10px"></a></td>
		</tr>
	</tbody>
	</table>


