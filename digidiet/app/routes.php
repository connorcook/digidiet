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
	$recipes = Recipe::all();
	//$posts = Recipe::with(‘user’)->order_by(‘updated_at’, ‘desc’)->paginate(5);
	return View::make('splash')->with('recipes', $recipes);
});

// Present the user with login form
Route::get('login', function() 
{
	return View::make('login');
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

Route::get('register', function() {
	return View::make('register');
});

Route::post('register', function() {
	$registration = array(
		'username' => Input::get('username'),
		'password' => Input::get('password'),
		'name' => Input::get('first_name') + " " + Input::get('last_name')
	);
	Eloquent::unguard();
	User::create(array(
		'username' => Input::get('username'),
		'password' => Hash::make(Input::get('password')),
		'name' => Input::get('first_name') + " " + Input::get('last_name'),
		'about_me' => Input::get('about_me')
	));
	return Redirect::to('/');
});