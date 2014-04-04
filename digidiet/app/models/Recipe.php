<?php

class Recipe extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'recipes';

	public function user()
	{
		return $this->belongsTo('User','author_id', 'id');
	}

	public function tags()
    {
        return $this->morphToMany('Tag', 'taggable');
    }

}