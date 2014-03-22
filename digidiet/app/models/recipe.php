<?php

class Recipe extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'recipes';

	public function recipes()
	{
		return $this->belongs_to('User', 'recipe_author');
	}

}