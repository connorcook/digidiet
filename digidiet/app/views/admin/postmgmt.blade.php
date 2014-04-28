
<h4>Post Management</h4>
	<h5>Flagged Posts</h5>
	<table>
	<thead>
	<!--table headers-->
		<tr><th>User</th><th>Post</th><th>Time Flagged</th><th>Delete</th></tr>
	</thead>
	<tbody>
			<tr ng-repeat="post in flags">
		<td><% post.user_id %></td>
		<td><% post.post_id %></td>
		<td><% post.updated_at %></td>
		<!-- <td><a class="fancybox" rel="group" href="/user/<% user.id %>"><% user.name %></a></td> -->
		<!-- <td><% user.roles[0].role_id == 1 ? "admin" : (user.roles[0].role_id == 2 ? "mod" : "user") %></td> -->
		<!-- <td><a href="#" ng-click="banUser(user.id, $index)" class="text-muted"><img src="/images/ban.png" style="height: 10px"></a></td> -->
		<!-- <td><form name="roleForm" ng-controller="userController" ng-submit="changeRole(user.id, user.roles[0].role_id)"> -->
			<!-- <select ng-model="user.roles[0].role_id" "ng-options = [1,2,3]" name="newRole" form="roleForm">
				<option value=2>Moderator</option>
				<option value=3>User</option>
				<option value=1>Admin</option>
			</select> -->
			<!--<input type="hidden" name="newRole" value="user.roles[0].role_id" ></input>-->
		<td><button>Save</button></form></td>
		</tr>
	</tbody>
	</table>


