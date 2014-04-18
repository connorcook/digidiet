<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Filename: create_tags.php
 * Class invariants: a database must exist
 * Author(s):
 * Last modified: April 18, 2014
 * Description: this file is used to create the tags table in the database
 */
class CreateTags extends Migration {

	/**
	 * Function name: up()
	 * Description: runs the migrations - creates the tags table in the database with
	 * an incrementing (numeric) 'id' field, and a string field called 'name'
	 * with a maximum width of 64 characters
	 * postconditions: the tags table is created with the given fields
	 * @params void
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function($table) {
			$table->increments('id');
			$table->string('name', 64);
		});
	}

	/**
	 * Function name: down()
	 * Description: reverses the migrations - drops the tags table from the database
	 * preconditions: the tags table must exist in the database
	 * postconditions: the tags table is dropped from the database
	 * @params void
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
	}

}
