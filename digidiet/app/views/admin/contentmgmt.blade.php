<h4>Content Management</h4>


<h5>Create New Announcement</h5>
<form name="announcementForm" ng-submit="announce(makeAnnounce)">
	<input type="text" ng-model="makeAnnounce" name="newAnnouncement" form="announcementForm">
</input><br>
<button>Save</button></form>
	

	<h5>Announcements</h5>
	<table class="striped tight sortable">
	<thead>
	<!--table headers-->
		<tr><th>Date</th><th>Announcement</th><th>Delete</th></tr>
	</thead>
	<tbody>
		<tr ng-repeat="announcement in announcements">
		<td><% announcement.updated_at %></td>
		<td><% announcement.content %></td>
		<td><a href="#" ng-click="destroyAnnounce(announcement.id, announcement)" class="text-muted"><i class="icon-ban-circle" style="padding:2px" title="Delete"></i></a></td>
		</tr>
	</tbody>
	</table>