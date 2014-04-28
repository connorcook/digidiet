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

		//do validation on input
		$v = User::validate(Input::all());

		//if it passes create the user
		if($v->passes()){ 

			//create path to image in 'username' folder
			$path = public_path().'/images/'.Input::get('username');
			
			//determine if file was uploaded,
			//if it was then use that, if not use the defualt profile picture
			if(Input::hasFile('image')){
				//create proper file name 
				$fileName = 'profile.'.Input::file('image')->getClientOriginalExtension();
				//move file to intended path
				Input::file('image')->move($path,$fileName);
			}
			else{
				//create directory for user's picture
				if( !is_dir($path) ){
                	mkdir($path);
            	}
				//move default picture into user's images directory
				$fileName = 'default_profile.jpg';
				copy(public_path().'/images/'.$fileName, $path.'/'.$fileName);
			}

			//make the User
			//save path of profile picture in avatar
			User::create(array(
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password')),
				'email' => Input::get('email'),
				'name' => Input::get('first_name')." ".Input::get('last_name'),
				'avatar' => 'images/'.Input::get('username').'/'.$fileName,
				'about_me' => Input::get('about_me'),
				'location' => Input::get('location')
			));
			

			$user = DB::table('users')
				->where('username', '=', Input::get('username'))
				->first();
			$role = DB::table('role')->where('title', '=', 'user')->first();
			
			//notify user with a welcome to digidiet!
			Notification::create(array(
                'user_id'       => $user->id,
                'link'          => 'profile',
                'icon'          => 'icon-bell',
                'acknowledged'  => FALSE,
                'content'       => "Welcome to digidiet, ".$user->username. 
                                "! Click here to view your new profile and start cooking."
        	));

			RoleUser::create(array(
				'user_id' => $user->id,
				'role_id' => $role->id
			));

			//validation has passed, so log the user in
			$userinfo = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);
			Auth::attempt($userinfo);

			//redirect to homepage
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
		$role = DB::table('role_user')->where('user_id', '=', $user->id)->get();
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

		if(Input::has('username')){
			$user->password = Hash::make(Input::get('password'));
		}

		if(Input::has('first_name') && Input::has('last_name')){
			$user->name 	= Input::get('first_name')." ".Input::get('last_name');
		}

		if(Input::has('about_me')){
			$user->about_me = Input::get('about_me');
		}

		if(Input::hasFile('image')){

			//contruct path and file name
			$path = public_path().'/images/'.$user->username;
			$fileName = 'profile.'.Input::file('image')->getClientOriginalExtension();

			//delete any previous avatars from directory
			$files = glob($path.'/profile*'); // get all file names
			foreach($files as $file){ // iterate files
  				if(is_file($file))
    				unlink($file); // delete file
			}

			//move file to path
			Input::file('image')->move($path,$fileName);

			//save reference ot path in DB
			$user->avatar = 'images/'.$user->username.'/'.$fileName;
		}

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


	public function changeRole($id)
	{
		if (!Auth::check())
		{
			return Redirect::to('/');
		}
		else if(Auth::user()->roles()->where('role_id','=',1))
		{
			//$role = DB::table('role_user')->where('user_id','=', $id);
			$role = RoleUser::where('user_id','=',$id)->first();
			$role->role_id = Input::get('newRole');
			//$role->role_id=2;
			$role->save();
			return Input::get('newRole');
		}
		else
		{
			return Redirect::to('/');
		}


	}
}