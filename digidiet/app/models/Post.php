<?php

class Post extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
 
/**
* validate the user's post on a recipe or profile
* 
* @param all of the user's unput when adding a post
* @return a Validator containg if the input passed the check or not, 
*			and any errors 
*/
	public static function validate($input){
		
		$rules = array(
				'content'=>'Required'
			);

		return Validator::make($input,$rules);
	}
}