<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipes extends Migration {

	/**
	 * Run the migrations.
	 * Creates the "recipes" table in the database
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function($table) {
            $table->increments('id');
            $table->string('post_title', 255);
            $table->text('post_body');
            $table->integer('post_author');
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
		Schema::drop('recipes');
	}

}
