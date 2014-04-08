<?php

class RatingController extends \BaseController {

	/**
	 * Store a rating
	 * Parameter: id of recipe to rate
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
		//reload the page
		return Redirect::to('/recipe/'.$id);	
	}
