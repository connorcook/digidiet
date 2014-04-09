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

Route::get('api', function() {
	return View::make('api');
});

Route::post('rate', 'RatingController@store');
Route::get('rating/{id}', 'RatingController@getRating');