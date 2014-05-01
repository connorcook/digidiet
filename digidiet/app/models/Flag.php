<?php

class Flag extends Eloquent{
	
	protected $table = 'flags';

	//defines a relationship between a flag and its author
	public function user(){
		return $this->belongsTo('User');
	}
	//defines relationship between a flag and the post flagged
	public function post(){
		return $this->belongsTo('Post');
	}
	//defines relationship between a flag and the recipe flagged (uses eager loading)
	public function recipe(){
		return $this->belongsTo('Recipe', 'post_id', 'id');
	}
}