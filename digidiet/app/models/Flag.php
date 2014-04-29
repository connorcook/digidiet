<?php

class Flag extends Eloquent{
	
	protected $table = 'flags';

	public function user(){
		return $this->belongsTo('User');
	}

	public function post(){
		return $this->belongsTo('Post');
	}

	public function recipe(){
		return $this->belongsTo('Recipe', 'post_id', 'id');
	}
}