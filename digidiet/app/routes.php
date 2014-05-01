<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Displays the 5 most recently created recipes on the splash page
 * @return a view of the splash page, populated with the 5 most
 * recently created recipes
 */
Route::get('/', function()
{
	$recipes = DB::table('recipes')->orderBy('created_at', 'desc')->take(5)->get();
	$announcements = DB::table('posts')->where('parent_type', '=', 'announcement')->orderBy('created_at', 'desc')->take(5)->get();
	return View::make('splash')->with(array('recipes'=>$recipes, 'announcements'=>$announcements));
});

/**
 * Present the user with login form
 * @return a view that is the user login form
 */
Route::get('login', function() 
{
	return View::make('users.login');
});

/**
 * Retrieves input from the login form ('users.login' view),
 * and attempts to log the user in by checking the input
 * against information stored in the database
 * @return a redirection to the homepage on successful login
 * @return a redirection to the login form with login errors dislayed
 * if the user fails to login
 */
Route::post('login', function() {

	$userinfo = array(
		'username' => Input::get('username'),
		'password' => Input::get('password')
	);

	//find user in table
	$user = User::where('username', Input::get('username'))->withTrashed()->first();

	//attempt login
	if( Auth::attempt($userinfo))
	{
		return Redirect::to('/');
	}
	//if the user given by the inputted user name exists and it has been soft deleted
	else if($user && $user->trashed())
	{
		return Redirect::to('login')->with('ban', true);
	}
	//catch all
	else{
		return Redirect::to('login')->with('login_errors', true);
	}
	
});

/**
 * Redirects the user to the homepage upon logging out
 * @return a redirection to the homepage
 */
Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');
});

/**
 * User registration GET route; handled by the create
 * function in the UserController class
 */
Route::get('register', 'UserController@create');

/**
 * User registration POST route; handled by the store
 * function in the UserController class
 */
Route::post('register', 'UserController@store');

/**
 * Routes to the user's profile page if authentication
 * information is true
 * @return a view that displays the user profile page
 * @return a redirection to the login page if user
 * authentication fails
 */
Route::get('profile', function() {
	if(Auth::check())
		return View::make('users.profile')->with('user', Auth::user());
	else return Redirect::to('login');
});

/**
 * Routes to the search results page
 * @return a view of the search results page, dislaying
 * the appropriate search results
 */
Route::post('search', function() { 
	$search = Input::get('search');
	return View::make('results')->with('search', $search);
	});

/**
 * A recipe RESOURCE route; handled by the
 * RecipeController class
 */
Route::resource('recipe', 'RecipeController');

/**
 * A user RESOURCE route; handled by the
 * UserController class
 */
Route::resource('user', 'UserController');

/**
 * A post RESOURCE route; handled by the
 * PostController class
 */
Route::resource('post', 'PostController');

/**
 * A notification RESOURCE route; handled by the
 * NotificationController class
 */
Route::resource('notification', 'NotificationController');

/**
 * return a page to add a recipe comment
 */
Route::get('recipe/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->create($id);
});

/**
 * return a page to add a user comment
 */
Route::get('user/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->create($id);
});

/**
 * Creates a recipe with a unique recipe id
 * @return a view indicating a successful post creation if
 * input validation is successful
 * @return a view indicating post creation failed if
 * input validation fails
 */
Route::post('recipe/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->store($id, 'recipe');
});

/**
 * Creates a user with a unique user id
 * @return a view indicating successful user creation
 * if input validation is successful
 * @return a view indicating unsuccessful user creation
 * if input validation fails
 */
Route::post('user/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->store($id, 'user');
});

//return the role of a given user by id
Route::get('user/{id}/role', function($id) {
	$controller = new UserController;
	return $controller->role($id);
});


/**
 * Routes to an API page
 * @return a view displaying the API
 */

Route::get('api', function() {
	return View::make('api');
});

/**
 * A rating POST route; handled by the store
 * function of the PostController class
 */
Route::post('rate', 'RatingController@store');

/**
 * A rating GET route; handled by the getRating
 * function of the RatingController class
 */
Route::get('rating/{id}', 'RatingController@getRating');

/**
 * An images GET route; handled by the getImage
 * function of the ImageController class
 */
Route::get(
	'public/images/{file}', 
	'ImageController@getImage'
);

/**
 * A route to display the administrator control panel
 */
Route::get('cp', function() {
	//if not logged in, go to home
	if(!Auth::check())
	{
		return Redirect::to('/');
	}
	//if administrator, show admin panel
	else if(User::find(Auth::user()->id)->roles()->where('role_id','=',1)->count()==1)
	{
		$users = User::paginate(12);
		return View::make('admin.admincp')->with('users', $users);
	}
	//if mod, show mod panel
	else if(User::find(Auth::user()->id)->roles()->where('role_id','=',2)->count()==1)
	{
		$users = User::paginate(12);
		return View::make('admin.modcp')->with('users', $users);
	}
	//otherwise, go home
	else
	{
		return Redirect::to('/');
	}
});
//overrided users get function for angular; return values without
//making a view
Route::get('ngusers', function() {
	$users = User::with('roles')->get();
	return Response::json($users);
});
//call the changeRole function in the user controller to change a user role
Route::post('user/{id}/changerole', 'UserController@changeRole');
//call the flag  function in the flag controller to flag something
Route::post('/flag',array('uses'=>'FlagController@flag'));
//get the list of all flags in the table
Route::get('/flag', 'FlagController@index');
//delete a flag from the table
Route::delete('/flag/{id}', 'FlagController@destroy');

//this route is overloading the resource route so that it has no return value
Route::delete('/ngrecipe/{id}', function($id){

	$recipe = Recipe::find($id);
	$user = User::find($recipe->author_id);
	Notification::create(array(
                'user_id'       => $user->id,
                'link'          => 'profile',
                'icon'          => 'icon-remove-sign',
                'acknowledged'  => FALSE,
                'content'       => "Dear ".$user->username. 
                                ", Your recipe ".$recipe->title." has been flagged and removed."
        	));


	$recipe->delete();
});

/*
* route for the static contact us page
*/
Route::get('contact', function(){
	return View::make('contact');
});


//Route to get announcements to show
Route::get('announcement', function(){
	return Post::where('parent_type','=','announcement')->get();
});
//Route to store announcements
Route::post('announcement', function(){
		Eloquent::unguard();
		Post::create(array( 
			'content' 		=> Input::get('content'),
			'author_id' 	=> Auth::user()->id,
			'parent_id'		=> 0,
			'parent_type'	=> 'announcement'
		));
		return Post::where('parent_type','=','announcement')->get();

});

//Route to delete announcement
Route::delete('announcement/{id}',function($id){
	$announcement = Post::find($id);
	$announcement->delete();
});


//Route to get deleted users
Route::get('bannedusers', function(){
	$busers = User::onlyTrashed()->get();
	return $busers;
});
//restore a user from the soft-deleted state
Route::post('unbanuser/{id}', function($id){
	$buser = User::onlyTrashed()->where('id','=',$id)->restore();
	// $buser->restore();
});