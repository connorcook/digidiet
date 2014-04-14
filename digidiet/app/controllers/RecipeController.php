<?php

class RecipeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$recipes = Recipe::paginate(12);
		return View::make('recipes.directory')->with('recipes', $recipes);
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
		$user = User::find($recipe->author_id);
		$rating = Rating::where('recipe_id', '=', $recipe->id)->avg('rating');
		//if not logged in, set rated so that recipes cannot be rated
		if(Auth::guest())
		{
			$rated = 1;
		}
		//otherwise, check if the user has already rated the recipe
		else
		{
			$rated = User::find(Auth::user()->id)->rating()->where('recipe_id', '=', $id)->count();
		}
		return View::make('recipes.info')->with(array('recipe' => $recipe, 'user' => $user, 'rating' => $rating, 'rated' => $rated));
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
	 * Return all posts for a given recipe $id
	 *
	 * @param  int  $id
	 * @return $posts
	 */
	public function posts($id)
	{
		return PostController::show($id, 'recipe');
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
		return Redirect::to('/');
	}

}