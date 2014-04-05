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

        Recipe::create(array(
                'name' => "Mom's pea soup",
                'author_id' => 1,
                'instructions' => "Boil water. Throw in split peas, carrots, ham, potatoes, onion, garlic. Cook until vegetables are soft. Season with salt and pepper.",
                'ingredients' => "Water, split peas, carrots, potatoes, ham, onion, garlic, salt",
        ));
        Recipe::create(array(
                'name' => 'Homemade Chicken Pot Pie',
                'author_id' => 1,
                'instructions' => "",
                'ingredients' => "",
        ));
        Recipe::create(array(
                'name' => 'Sushi Alaska Roll',
                'author_id' => 2,
                'instructions' => "Roll up some salmon, cucumber, and avocado in rice and seaweed.",
                'ingredients' => "Rice, seaweed, salmon, cucumber, avocado, sugar, vinegar",
        ));
        Recipe::create(array(
                'name' => 'Coffee-marinated Pork Chops',
                'author_id' => 2,
                'instructions' => "Marinate pork chops in coffee marinade over night (12+ hours). Grill over flame til desired doneness.",
                'ingredients' => "Coffee, worcestershire sauce, pork chops",
        ));
        Recipe::create(array(
                'name' => 'Eggs Benedict',
                'author_id' => 3,
                'instructions' => "",
                'ingredients' => "",
        ));
        Recipe::create(array(
                'name' => 'Chocolate Chip Pancakes',
                'author_id' => 3,
                'instructions' => "",
                'ingredients' => "",
        ));
        Recipe::create(array(
                'name' => 'Bowl of Cereal',
                'author_id' => 3,
                'instructions' => "Pour cereal in bowl, then pour milk in bowl.",
                'ingredients' => "Cereal, milk",
        ));
        Recipe::create(array(
                'name' => 'Cheesy Macaroni and Cheese',
                'author_id' => 4,
                'instructions' => "Cook some noodles, then melt some cheese in them.",
                'ingredients' => "Noodles, Cheese, salt, pepper",
        ));
        Recipe::create(array(
                'name' => 'Creamy Macaroni and Cheese',
                'author_id' => 4,
                'instructions' => "Cook some noodles, then melt some cheese in them.",
                'ingredients' => "Noodles, heavy cream, cheese",
        ));
        Recipe::create(array(
                'name' => 'Old fashioned',
                'author_id' => 4,
                'instructions' => "",              
                'ingredients' => "",
        ));
        Recipe::create(array(
                'name' => 'Worcester Steak',
                'author_id' => 5,
                'instructions' => "Marinate steak overnight in secret worcestershire-style sauce. Grill over flame til desired doneness",
                'ingredients' => "Worcestershire sauce, steak, cumin, salt, pepper,"
        ));
        Recipe::create(array(
                'name' => "Grandma's Pecan Pie",
                'author_id' => 6,
                'instructions' => "A whole lot of candied pecans in a pie shell. Bake at 350 deg F for 40 minutes.",
                'ingredients' => "Candied pecans, pie crust",
        ));
        Recipe::create(array(
                'name' => 'The Best Philly Cheesesteak',
                'author_id' => 7,
                'instructions' => "",
                'ingredients' => "",
        ));
        Recipe::create(array(
                'name' => 'Cheesy Cheese Pizza',
                'author_id' => 7,
                'instructions' => "Roll dough, put on sauce, put on cheese, bake in 400 degree Fahrenheit oven for 20 minutes",
                'ingredients' => "Water, flour, pizza sauce, mozzarella cheese",
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