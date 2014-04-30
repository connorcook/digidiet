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
			},

			//get announcements
			getAnnounce: function() {
				return $http.get('announcement');
			},

			//store an announcement
			announce: function($text) {
				ret = $http.post('announcement', {content: $text})
					.success(function(data){
						return data;
					});
				return ret;
			},
			destroyAnnounce: function(id) {
				$http.delete('announcement/'+id);
			} 
		}

	});