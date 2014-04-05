<?php

class RecipeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('recipes.directory')->with('recipes', Recipe::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('recipes.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return User::create([
			'title' => Input::get('title'),
			'description' => Input::get('description'),
			'ingredients' => Input::get('ingredients'),
			'instructions' => Input::get('instructions'),
			'author_id' => User::getAuthIdentifier()
			]);
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
		return View::make('recipes.info')->with('recipe', $recipe);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('recipes.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$recipie = Recipe::find($id);
			$recipie->title = Input::get('title');
			$recipie->description = Input::get('description');
			$recipie->ingredients = Input::get('ingredients');
			$recipie->instructions = Input::get('instructions');
			$recipie->author_id = User::getAuthIdentifier();
			
			$recipe->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$recipie = Recipe::find($id);
		$recipie->delete();
	}

}