<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(12);
		return View::make('users.directory')->with('users', $users);
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
		Eloquent::unguard();

		$v = User::validate(Input::all());

		if($v->passes()){ 

			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password')),
				'name' => Input::get('first_name')." ".Input::get('last_name'),
				'about_me' => Input::get('about_me'),
				'location' => Input::get('location')
			));

			$user = DB::table('users')
				->where('username', '=', Input::get('username'))
				->first();
			$role = DB::table('role')->where('title', '=', 'user')->first();
			
			RoleUser::create(array(
				'user_id' => $user->id,
				'role_id' => $role->id
			));

			return Redirect::to('/');
		}
		else{
			return Redirect::to('register')->withErrors($v);
		}
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
	 * Return the role for the specified user.
	 *
	 * @param  int  $id
	 * @return $role
	 */
	public function role($id)
	{
		$user = User::find($id);
		$role = DB::table('role_user')->where('user_id', '=', $user->id)->first()->get();
		return $role;
	}

	/**
	 * Return all posts for a given user $id
	 *
	 * @param  int  $id
	 * @return $posts
	 */
	public function posts($id)
	{
		return DB::table('posts')->where('author_id', '=', $id)->get();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('users.edit')->with('user', User::find($id));
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
		if(Input::has('username'))
			$user->password = Hash::make(Input::get('password'));
		if(Input::has('first_name') && Input::has('last_name'))
			$user->name 	= Input::get('first_name')." ".Input::get('last_name');
		if(Input::has('about_me'))
			$user->about_me = Input::get('about_me');
		if(Input::has('image'))
			$user->avatar 	= Input::get('image');
		if(Input::has('location'))
			$user->location = Input::get('location');

		$user->save();
		return View::make('users.profile')->with('user', $user);
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