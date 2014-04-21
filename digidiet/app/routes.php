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

Route::get('/', function()
{
	$recipes = DB::table('recipes')->orderBy('created_at', 'desc')->take(5)->get();
	return View::make('splash')->with('recipes', $recipes);
});

// Present the user with login form
Route::get('login', function() 
{
	return View::make('users.login');
});

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

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');
});

Route::get('register', 'UserController@create');

Route::post('register', 'UserController@store');

Route::get('profile', function() {
	if(Auth::check())
		return View::make('users.profile')->with('user', Auth::user());
	else return Redirect::to('login');
});

Route::post('search', function() { 
	$search = Input::get('search');
	return View::make('results')->with('search', $search);
	});

Route::resource('recipe', 'RecipeController');
Route::resource('user', 'UserController');
Route::resource('post', 'PostController');
Route::get('recipe/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->create($id);
});
Route::get('user/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->create($id);
});

Route::post('recipe/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->store($id, 'recipe');
});
Route::post('user/{id}/post', function($id) {
	$controller = new PostController;
	return $controller->store($id, 'user');
});

Route::get('user/{id}/role', function($id) {
	$controller = new UserController;
	return $controller->role($id);
});

Route::get('api', function() {
	return View::make('api');
});

Route::post('rate', 'RatingController@store');
Route::get('rating/{id}', 'RatingController@getRating');

Route::get(
	'public/images/{file}', 
	'ImageController@getImage'
);
Route::get('cp', function() {
	if(!Auth::check())
	{
		return Redirect::to('/');
	}
	else if(Auth::user()->roles()->where('role_id','=',1))
	{
		$users = User::paginate(12);
		return View::make('admin.admincp')->with('users', $users);;
	}
	else if(Auth::user()->roles()->where('role_id','=',2))
	{
		$users = User::paginate(12);
		return View::make('admin.modcp')->with('users', $users);;
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

