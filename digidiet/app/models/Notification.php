<?php

class Notification extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications';

	protected $guarded = array('id');

	public function user()
	{
		return $this->belongsTo('User');
	}
	
}