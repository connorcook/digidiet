
<h4>Post Management</h4>
	<h5>Flagged Posts</h5>
	<table class="striped tight sortable">
	<thead>
	<!--table headers-->
		<tr><th>Author</th><th>Type</th><th>Post</th><th>Time Flagged</th><th>Flagged By</th><th>Delete</th></tr>
	</thead>
	<tbody>
		<tr ng-repeat="flag in flags">
		<td ng-if="flag.post_type=='comment'"><% flag.post.user.username %></td>
		<td ng-if="flag.post_type=='recipe'"><% flag.recipe.user.username %></td>
		<td><% flag.post_type %></td>
		<td ng-if="flag.post_type=='comment'"><a href="recipe/<% flag.post.parent_id %>"><% flag.post.content %></a></td>
		<td ng-if="flag.post_type=='recipe'"><a href="recipe/<% flag.recipe.id %>"><% flag.recipe.title %></a></td>
		<td><% flag.updated_at %></td>
		<td><% flag.user.username %></td>
		<td><a href="#" ng-click="delFlag(flag.id, flag.post_type, flag.post_id, flag)" class="text-muted"><i class="icon-thumbs-down" style="padding:2px" title="Delete"></i></a>
			<a href="#" ng-click="unFlag(flag.id, flag)" class="text-muted"><i class="icon-thumbs-up" style="padding:2px" title="Unflag"></i></a></td>
		</tr>
	</tbody>
	</table>


