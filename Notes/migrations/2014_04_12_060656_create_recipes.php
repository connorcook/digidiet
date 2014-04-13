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
			// auto-increment ID / primary key
            $table->increments('id');
            $table->string('title', 255);
            $table->text('description');
            $table->text('ingredients');
            $table->text('instructions');
            $table->string('image_url', 225);
            $table->integer('author_id')->unsigned();
			$table->float('rating')->unsigned()->default(0);     
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