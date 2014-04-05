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
		//must be logged in to view a recipe
		if(Auth::guest()){
			return Redirect::to('recipe');
		}
		else{
			return View::make('recipes.add');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		Eloquent::unguard();
		Recipe::create([
			'title' => Input::get('title'),
			'description' => Input::get('description'),
			'ingredients' => Input::get('ingredients'),
			'instructions' => Input::get('instructions'),
			'author_id' => Auth::user()->id
			]);
		return Redirect::to('/');		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recipe = Recipe::find($id);
		$user = User::find($recipe -> author_id);
		return View::make('recipes.info')->with(array('recipe' => $recipe, 'user' => $user));
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
			$recipe = Recipe::find($id);
			$recipe->title = Input::get('title');
			$recipe->description = Input::get('description');
			$recipe->ingredients = Input::get('ingredients');
			$recipe->instructions = Input::get('instructions');
			$recipe->author_id = User::getAuthIdentifier();
			
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
		$recipe = Recipe::find($id);
		$recipe->delete();
	}

}