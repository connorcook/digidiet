<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 * Create users table in db
	 * Then store a record for the admin
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('username', 64);
			$table->string('password', 64);
			$table->string('email',64);
			$table->string('name', 128);
			$table->string('location', 64);
			$table->text('about_me');
			$table->string('avatar', 128);
			$table->softDeletes();
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}