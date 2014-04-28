angular.module('userService', [])

	.factory('User', function($http) 	{
		return	{
			//get all the users
			get : function() {
				return $http.get('/ngusers');
			},

			//ban a user
			destroy : function(id) {
				return $http.delete('/user/'+id);
			},

			role : function(id, $postdata) {
			

				return $http.post('/user/'+id+'/changerole', {newRole: $postdata});
			},

			flags: function() {
				return $http.get('/flag');
			}
			
		}

	});