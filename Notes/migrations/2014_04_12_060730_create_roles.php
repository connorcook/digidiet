<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Filename: create_roles.php
 * Class invariants: a database must exist
 * Author(s):
 * Last modified: April 18, 2014
 * Description: this file is used to create the role table in the database
 */
class CreateRoles extends Migration {

	/**
	 * Function name: up()
	 * Description: runs the migrations - creates the role table in the database with
	 * an incrementing (numeric) 'id' field, a string field called 'title',
	 * and two timestamp fields, 'created_at' and 'modified_at'
	 * postconditions: the role table is created with the given fields
	 * @params void
	 * @return void
	 */
	public function up()
	{
		Schema::create('role', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->timestamps();
		});
	}

	/**
	 * Function name: down()
	 * Description: reverses the migrations - drops the role table from the database
	 * preconditions: the role table must exist in the database
	 * postconditions: the role table is dropped from the database
	 * @params void
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role');
	}
}