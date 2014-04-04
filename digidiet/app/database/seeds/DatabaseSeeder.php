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
                'about_me' => "Hello world.",
                'location' => "Moon Base Alpha"
        ));
		for($i = 0; $i < 100; $i++){
        	User::create(array(
                'username' => 'rainbowkitty'.$i,
                'password' => Hash::make('sparklesparklejazz'),
                'name' => 'John Smith, #'.$i,
                'about_me' => "The username says it all.",
                'location' => "Eternia"
        	));
    	}
	}
}

class RecipeTableSeeder extends Seeder {

	public function run()
	{
		DB::table('recipes')->delete();
		Recipe::create(array(
                'title' => 'Buttered Delicious Crumpets',
                'description' => 'This is a delicious recipe.',
                'author_id' => 1,
                'instructions' => "Take butter, melt, pour over dough, cook at 400 degrees Fahrenheit for 20 minutes.",
                'ingredients' => "Butter, Dough, Oven, and a Smile"
        ));
        
        for($i = 0; $i < 100; $i++){
        	$recipe = array(
                'title' => 'Secret Bread Recipe #'.$i,
                'description' => 'This is a secret delicious recipe for bread.',
                'author_id' => 1,
                'instructions' => "Take butter, melt, pour over dough, cook at ".($i*20)." degrees Fahrenheit for 20 minutes.",
                'ingredients' => "Butter, Dough, Oven, and ".$i." Smile(s)"
        	 );
        	Recipe::create($recipe);
        	// $user = User::find($i+1);
        	// $recipe = Recipe::find($i+1);
        	// $recipe->user()->save($user);
        }

	}
}