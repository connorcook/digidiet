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
	return View::make('splash')->with('recipes', $recipes);
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
	if( Auth::attempt($userinfo))
	{
		return Redirect::to('/');
	}
	else
	{
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
 * 
 */
Route::get('recipe/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->create($id);
});

/**
 * 
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
	if(!Auth::check())
	{
		return Redirect::to('/');
	}
	else if(User::find(Auth::user()->id)->roles()->where('role_id','=',1)->count()==1)
	{
		$users = User::paginate(12);
		return View::make('admin.admincp')->with('users', $users);
	}
	else if(User::find(Auth::user()->id)->roles()->where('role_id','=',2)->count()==1)
	{
		$users = User::paginate(12);
		return View::make('admin.modcp')->with('users', $users);
	}
	else
	{
		return Redirect::to('/');
	}
});

Route::get('ngusers', function() {
	$users = User::with('roles')->get();
	return Response::json($users);
});

Route::post('user/{id}/changerole', 'UserController@changeRole');

Route::post('/flag',array('uses'=>'FlagController@flag'));