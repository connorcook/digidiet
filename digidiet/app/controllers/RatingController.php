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
		//make an instance of a rating controller to 
		//$ratingController = new RatingController();
		$rating = $this->getRating($id);
		$recipe = Recipe::find($id);
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