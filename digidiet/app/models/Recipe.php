<?php

/**
 * Filename: Recipes.php
 * Class invariants: a table named 'recipes' (no quotes) must exist in the database.
 * This file must exist in the models directory for the application
 * Author(s):
 * Last modified: April 18, 2014
 * Description: models a recipe of the recipes table in the database
 */
class Recipe extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'recipes';

	/**
	 * Function name: user()
	 * Description: establishes a belongsTo relationship with a particular user
	 * preconditions: the user must exist with a valid id (author_id);
	 * this recipe must have a valid id
	 * postconditions: the recipe "belongs to" (is associated with) the user
	 * @params
	 * @return a belongsTo relationship with a particular user
	 */
	public function user()
	{
		return $this->belongsTo('User','author_id', 'id');
	}

	/**
	 * Function name: tags()
	 * Description: establishes a many-to-many polymorphic relationship with the Tag model
	 * preconditions: a Tag model must exist 
	 * postconditions: the recipe is associated with one or many tags
	 * @params
	 * @return a morphToMany relationship with the Tag model
	 */
	public function tags()
    {
        return $this->morphToMany('Tag', 'taggable');
    }
	
	/**
	 * Function name: rating()
	 * Description: establishes a one-to-many relationship with the Rating model
	 * preconditions: a Rating model must exist
	 * postconditions: the recipe has many ratings
	 * @params
	 * @return a hasMany relationship with the Rating model
	 */
	public function rating()
	{
		return $this->hasMany('Rating');
	}
	/**
	 * validate the input when a user adds a recipe
	 * @param $input - the input the user gives when adding a recipe
	 * @return a validator the contains if the input passed the check or not
	 **/

	public static function validate($input){

		$rules = array(
				'title' => 'Required',
				'description' => 'Required',
				'ingredients' => 'Required',
				'instructions' => 'Required'
			);

		return Validator::make($input, $rules);
	}
}