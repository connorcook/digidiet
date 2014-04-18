<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Filename: create_role_user.php
 * Class invariants: a database must exist
 * Author(s):
 * Last modified: April 18, 2014
 * Description: this file is used to create the role_user table in the database
 */
class CreateRoleUser extends Migration {

	/**
	 * Function name: up()
	 * Description: runs the migrations - creates the role_user table in the database with
	 * an unsigned integer 'role_user' field, an unsigned bigInteger 'user_id' field,
	 * and two timestamp fields, 'created_at' and 'modified_at'
	 * postconditions: the role_user table is created with the given fields
	 * @params void
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_user', function(Blueprint $table) {
			$table->integer('role_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Function name: down()
	 * Description: reverses the migrations - drops the role_user table from the database
	 * preconditions: the role_user table must exist in the database
	 * postconditions: the role_user table is dropped from the database
	 * @params void
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_user');
	}
}