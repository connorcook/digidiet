<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Redirect::to('/');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if(Auth::check())
			return View::make('posts.create')->with(array('id' => $id));
		else URL::to('login');
	}

	/**
	 * Store the post attached to $id of $type in storage.
	 *
	 * @param  int  $id, string $type
	 * @return Response
	 */
	public function store($id, $type)
	{
		Eloquent::unguard();
		$v = Post::validate(Input::all());

		if($v->passes()){
			$post = Post::create(array( 
			'content' 		=> Input::get('content'),
			'author_id' 	=> Auth::user()->id,
			'parent_id'		=> $id,
			'parent_type'	=> $type
		));
			
		return Redirect::to('/'.$type.'/'.$id.'#'.$post->id);
		}
		else{
			return Redirect::to('/'.$type.'/'.$id)->withErrors($v);
			return $v->messages()->toJson();
			
		}
	}

	/**
	 * Show the post with a given $id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function show($id)
	// {
		// $post = Post::find($id);
		// return Redirect::to('/'.$post->parent_type.'s/'.$post->parent_id.'#'.$post->id);
	// }

	/**
	 * Show all posts with a resource $id of $type
	 *
	 * @param  int  $id, string $type
	 * @return $posts
	 */
	public function show($id, $type)
	{
		return DB::table('posts')
			->where('parent_type', '=', $type)
			->where('parent_id', '=', $id)
			->get();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('posts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);

		$post->delete();
		return Redirect::to('/');
	}

}