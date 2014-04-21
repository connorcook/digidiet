<?php

/**
 * Filename: RecipeController.php
 * Author(s):
 * Class invariants: must have an associated view and model to communicate with
 * Last modified: April 20, 2014
 * Description: processes input from recipe view(s); handles recipe-based
 * logic to determine what actions to perform on the recipe model, and
 * then performs those actions accordingly
 */
class RecipeController extends \BaseController {

	/**
	 * Displays a directory listing of all the recipes in the database
	 * @param void
	 * @return A view that displays the recipes directory, populated with
	 * recipes
	 */
	public function index()
	{
		$recipes = Recipe::paginate(12);
		return View::make('recipes.directory')->with('recipes', $recipes);
	}

	/**
	 * Displays the form for adding recipes to the database
	 * @param void
	 * @return A view that displays a form for adding a recipe
	 * to the database, or redirection to recipe page if user is a guest
	 * (that is, if the user is not logged in)
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
	 * Stores user input in the database when a user adds a recipe
	 * preconditions: user must be logged in and able to add a recipe
	 * postconditions: the recipe and its associated information (input fields)
	 * are stored in the database
	 * @param void
	 * @return redirection to homepage on successful recipe creation; or
	 * redirection to recipe creation page with errors displayed
	 */
	public function store()
	{
		
		Eloquent::unguard();
		$v = Recipe::validate(Input::all());

		if($v->passes()){
			Recipe::create(array(
				'title' => Input::get('title'),
				'description' => Input::get('description'),
				'ingredients' => Input::get('ingredients'),
				'instructions' => Input::get('instructions'),
				'author_id' => Auth::user()->id
			));
			return Redirect::to('/');
		}
		else{
			return Redirect::to('recipe/create')->withErrors($v);
		}
				
	}

	/**
	 * Displays the recipe with the given recipe $id parameter
	 * preconditions: caller must provide a valid recipe $id
	 * postconditions: the recipe, and its associated information
	 * (including user information for the user who posted the recipe)
	 * is displayed
	 * @param  int $id - the id of the recipe to be displayed
	 * @return a view displaying information pertaining to the recipe with
	 * recipe id equal to $id, including user information for the user who
	 * posted the recipe
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
	 * Displays a form (view) for editing a recipe whose id is $id
	 * preconditions: $id must be a valid recipe id
	 * postconditions: a form (view) is displayed to the user
	 * @param  int $id - the id of the recipe to be edited
	 * @return a view that displays a form for editing the recipe
	 */
	public function edit($id)
	{
		return View::make('recipes.edit');
	}

	/**
	 * Displays all comments for a recipe whose recipe id is $id
	 * preconditions: $id must be a valid recipe id
	 * postconditions: comments for the particular recipe are displayed
	 * @param  int $id - the recipe id
	 * @return a view that displays the comments for the recipe with
	 * recipe id equal to $id
	 */
	public function posts($id)
	{
		return PostController::show($id, 'recipe');
	}




	/**
	 * Edits (updates) recipe information for an existing recipe with
	 * recipe id equal to $id
	 * preconditions: $id must be a valid recipe id
	 * postconditions: the recipe information is updated in the database
	 * @param  int $id - the recipe id of the recipe to be updated
	 * @return void
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
	 * Deletes the recipe with recipe id equal to $id from
	 * the database
	 * preconditions: $id must be a valid recipe id
	 * postconditions: the recipe with recipe id equal to
	 * $id is deleted from the database, or nothing if the
	 * recipe id does not exist
	 * @param  int $id - the recipe id of the recipe to be
	 * deleted
	 * @return a redirection to the homepage
	 */
	public function destroy($id)
	{
		$recipe = Recipe::find($id);
		$recipe->delete();
		return Redirect::to('/');
	}

}