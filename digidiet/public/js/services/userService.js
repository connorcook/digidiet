angular.module('userService', [])

	.factory('User', function($http) 	{
		return	{
			//get all the users
			get : function() {
				return $http.get('/ngusers');
			},

			//ban a user
			destroy : function(id) {
				$http.delete('/user/'+id);
			},
			//change the user's role
			role : function(id, $postdata) {
				return $http.post('/user/'+id+'/changerole', {newRole: $postdata});
			},
			//get an index of the flags
			flags: function() {
				return $http.get('/flag');
			},
			//delete a flagged post and the flag itself
			delFlag: function(id, post_type, postid) {
				$http.delete('/flag/'+id);
				if(post_type=="comment"){
					$http.delete('/post/'+postid);
				}

				else if(post_type=="recipe"){
					$http.delete('/ngrecipe/'+postid);
				}

			},
			//delete just a flag but keep the post
			unFlag: function(id) {
				$http.delete('/flag/'+id);
			}
			
		}

	});