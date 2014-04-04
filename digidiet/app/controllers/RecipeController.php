<?php

class RecipeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('recipies.directory')->with('recipies', Recipie::all());
		//MAKE CORRESPONDING VIEW (DIRECTORY)
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('recipies.add');
		//MAKE CORRESPONDING VIEW (ADD)
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//UPDATE DB RECIPIES TABLE WITH DESIRED ATTRIBUTES (CHANGE MIGRATION)
		//FINISH
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recipie = User::find($id);
		return View::make('recipies.info')->with('recipie', $recipie);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('recipies.edit');
		//CREATE CORRESPONDING VIEW (EDIT)
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//SEE STORE
		//FINISH
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$recipie = Recipie::find($id);
		$recipie->delete();
	}

}