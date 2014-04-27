<div ng-app="userApp" ng-controller="userController">
<h4>User Management</h4>
	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	
	<!-- THE USERS =============================================== -->
	<!-- hide these users if the loading variable is true -->

	<!--display a list of the users and their roles with options to ban and edit role-->
	<table>
	<thead>
	<!--table headers-->
		<tr><th>UserID</th><th>UserName</th><th>Role</th><th>Ban</th><th>Change Role</th></tr>
	</thead>
	<!--show loading dialogue-->
<h3 ng-show="loading">loading</h3>
<!--actual table-->
	<tbody ng-hide="loading" ng-repeat="user in users track by $index  | limitTo:pageSize">
			<tr>
		<td><% user.id %></td>
		<td><% user.name %></td>
		<td><% user.roles[0].role_id == 1 ? "admin" : (user.roles[0].role_id == 2 ? "mod" : "user") %></td>
		<td><a href="#" ng-click="banUser(user.id, $index)" class="text-muted"><img src="/images/ban.png" style="height: 10px"></a></td>
		<td><form name="roleForm" ng-controller="userController" ng-submit="changeRole(user.id, user.roles[0].role_id)">
			<select ng-model="user.roles[0].role_id" "ng-options = [1,2,3]" name="newRole" form="roleForm">
				<option value=2>Moderator</option>
				<option value=3>User</option>
				<option value=1>Admin</option>
			</select>
			<!--<input type="hidden" name="newRole" value="user.roles[0].role_id" ></input>-->
			<button>Save</button></form></td>
		</tr>
	</tbody>
	</table>
<!-- 	 <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
        Previous
    </button>
        <%currentPage+1%>/<%data.length/pageSize%>
    <button ng-disabled="currentPage >= data.length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next
    </button> -->
	</div>

