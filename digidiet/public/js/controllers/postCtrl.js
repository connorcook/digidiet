angular.module('postCtrl',[])

	//inject the User service into the controller
	.controller('postController', function($scope, $http, User)
	{
		$scope.loading = true;
		Post.getFlags()
			.success(function(data){
				$scope.posts = data;
				$scope.loading = false;
			});		
		// $Post.o()
		// 	.success(function(data){

		// 	})
		// //Ban a user
		// $scope.banUser = function(id, $index) {
		// 	//remove from the view
		// 	$scope.users.splice($index, 1);
		// 	//remove from the db
		// 	User.destroy(id);
			
		// };

		// $scope.changeRole = function(id, role) {
			
		// 	User.role(id, role);
		// }

	});