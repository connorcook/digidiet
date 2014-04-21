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
		$scope.banUser = function(id) {
			$scope.loading = true;

			User.destroy(id)
				.success(function(data){
					//refresh list
					User.get()
						.success(function(getData) {
							$scope.users = getData;
							$scope.loading = false;
						});
				});
		};

		$scope.changeRole = function(id, role) {
			
			User.role(id, role);
		}

	});