<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('RecipeTableSeeder');

		$this->command->info("User table seeded.");
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
                'username' => 'admin',
                'password' => Hash::make('devdes'),
                'name' => 'Administrator',
                'about_me' => "Hello world."
        ));

        User::create(array(
                'username' => 'rainbowkitty69',
                'password' => Hash::make('sparklesparklejazz'),
                'name' => 'John Smith',
                'about_me' => "The username says it all."
        ));
	}
}

class RecipeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('recipes')->delete();
		Recipe::create(array(
                'recipe_name' => 'Buttered Delicious Crumpets',
                'recipe_body' => "Take butter, melt, pour over dough, cook at 400 degrees Fahrenheit for 20 minutes.",
                'author_id' => 1
                
        ));

	}
}