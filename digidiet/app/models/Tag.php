<?php

class Recipe extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	public function recipes()
    {
        return $this->morphedByMany('Recipe', 'taggable');
    }

}