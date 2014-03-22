<?php

use \Illuminate\Auth\UserInterface;

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public function posts()
	{
		return $this->has_many('Post');
	}

}