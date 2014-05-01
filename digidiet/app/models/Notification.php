<?php

class Notification extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications';

	protected $guarded = array('id');
	//defines relationship between a notification and the user notified
	public function user()
	{
		return $this->belongsTo('User');
	}
	
}