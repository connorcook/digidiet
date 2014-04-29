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
			},

			delFlag: function(id, post_type, postid) {
				$http.delete('/flag/'+id);
				if(post_type=="comment"){
					$http.delete('/post/'+postid);
				}

				else if(post_type=="recipe"){
					$http.delete('/ngrecipe/'+postid);
				}

			}
			
		}

	});