<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Filename: create_posts.php
 * Class invariants: a database must exist
 * Author(s):
 * Last modified: April 18, 2014
 * Description: this file is used to create the posts table in the database
 */
class CreatePosts extends Migration {

	/**
	 * Function name: up()
	 * Description: runs the migrations - creates the posts table in the database with
	 * an incrementing (numeric) 'id' field, an integer 'parent_id' field,
	 * an integer 'author_id' field, a string field called 'parent_type'
	 * with a maximum width of 64 characters, a text 'content' field, and
	 * two timestamp fields, 'created_at' and 'modified_at'
	 * postconditions: the posts table is created with the given fields
	 * @params void
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->integer('parent_id')->unsigned();
			$table->integer('author_id')->unsigned();
			$table->string('parent_type', 64);
			$table->text('content');

			$table->timestamps();
		});
	}

	/**
	 * Function name: down()
	 * Description: reverses the migrations - drops the posts table from the database
	 * preconditions: the posts table must exist in the database
	 * postconditions: the posts table is dropped from the database
	 * @params void
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
