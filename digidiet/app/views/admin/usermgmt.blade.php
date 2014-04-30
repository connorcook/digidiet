
<h4>User Management</h4>

<h5>Banned Users</h5>
<table class="striped tight sortable">
	<thead>
		<tr><th>ID</th><th>UserName</th><th>Name</th><th>Date Banned</th><th>Restore</th></tr>
	</thead>
	<tbody>
		<tr ng-repeat="buser in busers">
		<td><% buser.id %></td>
		<td><% buser.username %></a></td>
		<td><% buser.name %></td>
		<td><% buser.updated_at %></td>
		<td><a href="#" ng-click="unBanUser(buser.id, buser)" class="text-muted"><i class="icon-legal" style="padding:2px" title="Restore User"></i></a></td>
		</tr>
	</tbody>
	</table>



<h5>Registered Users</h5>

	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	
	<!-- THE USERS =============================================== -->
	<!-- hide these users if the loading variable is true -->

	<!--display a list of the users and their roles with options to ban and edit role-->
	<table class="striped tight sortable">
	<thead>
	<!--table headers-->
		<tr><th>ID</th><th>UserName</th><th>Name</th><th>Role</th><th>Ban</th><th>Change Role</th></tr>
	</thead>
	<!--show loading dialogue-->
<h3 ng-show="loading">loading</h3>
<!--actual table-->
Search User: <input ng-model="searchText">
	<tbody ng-hide="loading">
			<tr ng-repeat="user in users | filter:searchText">
		<td><% user.id %></td>
		<td><a href="/user/<% user.id %>"><% user.username %></a></td>
		<td><% user.name %></td>
		<td><% user.roles[0].role_id == 1 ? "admin" : (user.roles[0].role_id == 2 ? "mod" : "user") %></td>
		<td><a href="#" ng-click="banUser(user.id, user)" class="text-muted"><img src="/images/ban.png" style="height: 10px"></a></td>
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
	

