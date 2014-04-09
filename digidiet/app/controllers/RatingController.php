<?php

class RatingController extends \BaseController {

	/**
	 * Store a rating
	 * Parameter: none
	 * @return Response
	 */
	public function store()
	{
		//get the id of the recipe to be rated
		$id = Input::get('recipe_id');
		Eloquent::unguard();
		//create a rating based on the input data
		Rating::create([
			'recipe_id' => Input::get('recipe_id'),
			'rating' => Input::get('rating'),
			'user_id' => Auth::user()->id
			]);
		//get the new average rating to store in the recipe table
		$rating = $this->getRating($id);
		//get the recipe instance to store the new rating
		$recipe = Recipe::find($id);
		//store the new rating and save it
		$recipe->rating = $rating;
		$recipe->save();
		//reload the page
		return Redirect::to('/recipe/'.$id);	
	}
	
	
	/**
	 * Get average rating of a recipe
	 * Parameter: id of recipe to get rating for
	 * @return Response
	 */
	public function getRating($id)
	{
		$rating = Rating::where('recipe_id', '=', $id)->avg('rating');
		return $rating>0 ? $rating : 0;
	}
}