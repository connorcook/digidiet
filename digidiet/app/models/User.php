<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	//enable soft deletes for banning users
	protected $softDelete = true;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $guarded = array('id', 'password');
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	
	/**
	 * Get a list of the ratings associated with this recipe
	 *
	 * @return array of ratings
	 */
	public function rating()
	{
		return $this->hasMany('Rating');
	}
	
	/**
	 * Get the users who have rated this recipe
	 *
	 * @return array of users
	 */
	public function recipeRatings()
	{
		return $this->hasManyThrough('Rating', 'Recipe', 'author_id', 'user_id');
	}

	/**
	 * validate the input when registering a User
	 * 
	 * @return Validator of input compared to rules 
	 */
	public static function validate($input){


		$rules = array(
				'username' => 'Required|Unique:users,username',
				'password' => 'Required|Min:8|Confirmed',
				'password_confirmation' => 'Required|Min:8',
				'first_name' => 'Required',
				'email' => 'Required|Email|Unique:users,email|Confirmed',
				'email_confirmation' => 'Required|Email|Unique:users,email'
		);

		return Validator::make($input,$rules);
	}

	public function roles()
	{
		return $this->hasMany('RoleUser');
	}

}