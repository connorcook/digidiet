<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.directory')->with('users', User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		return User::create(array(
			'username' => Input::get('username'),
			'password' => Hash::make(Input::get('password')),
			'name' => Input::get('first_name')." ".Input::get('last_name'),
			'about_me' => Input::get('about_me'),
			'avatar' => Input::get('image'),
			'location' => Input::get('location')
		));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('users.profile')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->name 	= Input::get('first_name')." ".Input::get('last_name');
		$user->about_me = Input::get('about_me');
		$user->avatar 	= Input::get('image');
		$user->location = Input::get('location');

		$user->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		$user->delete();
	}

}