angular.module('userCtrl',[])

	//inject the User service into the controller
	.controller('userController', function($scope, $http, User)
	{
		$scope.loading = true;
		User.get()
			.success(function(data){
				$scope.users = data;
				$scope.loading = false;
			});		

		//Ban a user
		$scope.banUser = function(id, $index) {
			//remove from the view
			$scope.users.splice($index, 1);
			//remove from the db
			User.destroy(id);
			
		};

		$scope.changeRole = function(id, role) {
			
			User.role(id, role);
		}

	});