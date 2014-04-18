<?php

/**
 * Filename: Tag.php
 * Class invariants: a table named 'tags' (no quotes) must exist in the database.
 * This file must exist in the models directory for the application
 * Author(s):
 * Last modified: April 18, 2014
 * Description: models a tag of the tags table in the database
 */
class Tag extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	/**
	 * Function name: recipes()
	 * Description: establishes a many-to-many polymorphic relationship with the Recipe model
	 * preconditions: a Recipe model must exist 
	 * postconditions: the tag is associated with one or more recipes
	 * @params
	 * @return a morphedByMany relationship with the Recipe model
	 */
	public function recipes()
    {
        return $this->morphedByMany('Recipe', 'taggable');
    }

}