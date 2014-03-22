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
			$table->string('name', 128);
			$table->text('about_me');
			$table->timestamps();
		});

		DB::table('users')->insert(array(
            'username'  => 'admin',
            'password'  => Hash::make('password'),
            'name'  => 'Admin'
        ));
	}

	/**
	 * Reverse the migrations.
	 * For now, just drop the tale.
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}