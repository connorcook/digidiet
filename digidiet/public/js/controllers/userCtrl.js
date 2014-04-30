angular.module('userCtrl',[])

	//inject the User service into the controller
	.controller('userController', function($scope, $http, $timeout, User)
	{
		//$scope.loading = true;
		
			User.get()
			.success(function(data){
				$scope.users = data;
				//$scope.loading = false;
				console.log("fetched data");
			});	
		
		//get announcements

		
		User.getAnnounce()
		.success(function(data){
			$scope.announcements = data;
		});
	
	$scope.getAnn;
		//get flags
		User.flags()
			.success(function(data){
				$scope.flags = data;
			});	

		//Ban a user
		$scope.banUser = function(id, user) {
			//remove from the view
			$scope.users.splice($scope.users.indexOf(user), 1);
			//remove from the db
			User.destroy(id);
			
		};
		//change a user's role
		$scope.changeRole = function(id, role) {
			
			User.role(id, role);
		}
		//delete a flagged post and its flag
		$scope.delFlag = function(id, post_type, post_id, flag) {

			$scope.flags.splice($scope.flags.indexOf(flag), 1);
			User.delFlag(id, post_type, post_id);
		}
		//delete just a flag but keep the post
		$scope.unFlag = function(id, flag) {

			$scope.flags.splice($scope.flags.indexOf(flag), 1);
			User.unFlag(id);
		}

		//add announcement
		$scope.announce = function(data) {
			console.log(data);
			User.announce(data)
			.success(function(){
				User.getAnnounce()
				.success(function(data){
				$scope.announcements = data;
			});
		});
		}

		$scope.destroyAnnounce = function(id, announcement){
			$scope.announcements.splice($scope.announcements.indexOf(announcement),1);
			User.destroyAnnounce(id);

		}


	});