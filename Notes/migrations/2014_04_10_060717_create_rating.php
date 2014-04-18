<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Filename: create_rating.php
 * Class invariants: a database must exist
 * Author(s):
 * Last modified: April 18, 2014
 * Description: this file is used to create the rating table in the database
 */
class CreateRating extends Migration {

	/**
	 * Function name: up()
	 * Description: runs the migrations - creates the rating table in the database with
	 * an incrementing (numeric) 'id' field, an integer 'recipe_id' field,
	 * an integer 'user_id' field, an integer 'rating' field, and
	 * two timestamp fields, 'created_at' and 'modified_at'
	 * postconditions: the rating table is created with the given fields
	 * @params void
	 * @return void
	 */
	public function up()
	{
		Schema::create('rating', function($table) {
			$table->increments('id');
			$table->integer('recipe_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('rating');
			$table->timestamps();
		});
	}

	/**
	 * Function name: down()
	 * Description: reverses the migrations - drops the rating table from the database
	 * preconditions: the rating table must exist in the database
	 * postconditions: the rating table is dropped from the database
	 * @params void
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rating');
	}

}
