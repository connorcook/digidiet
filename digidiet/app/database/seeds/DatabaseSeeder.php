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
        $this->command->info("User table seeded.");

		$this->call('RecipeTableSeeder');
        $this->command->info("Recipe table seeded.");

		$this->call('RoleTableSeeder');
        $this->command->info("Roles table seeded.");

		$this->call('RatingTableSeeder');
		$this->command->info("Rating table seeded.");
		
        $this->call('NotificationTableSeeder');
        $this->command->info("Notifcation table seeded.");
	}

}


class UserTableSeeder extends Seeder {

	public function run()
	{
        
        $path = public_path().'/images/admin';

        //create directory for admin's picture
        if( !is_dir($path) ){
            mkdir($path);
        }
        
        //move default picture into admin's directory
        $fileName = 'profile.jpg';
        copy(public_path().'/images/admin.jpg', $path.'/'.$fileName);

        User::create(array(
            'username'  => 'admin',
            'password'  => Hash::make('devdes'),
            'email' => 'test@email.com',
            'name'  => 'Administrator',
            'avatar' => 'images/admin/'.$fileName,
            'about_me' => 'Hello world.',
            'location' => 'Moon Base Alpha'
        ));
		
		for($i = 0; $i < 100; $i++){
            $path = public_path().'/images/rainbowkitty'.$i;
            //create directory for user's picture
            if( !is_dir($path) ){
                mkdir($path);
            }
            //move default picture into user's directory
            $fileName = 'default_profile.jpg';
            copy(public_path().'/images/'.$fileName, $path.'/'.$fileName);

        	User::create(array(
                'username' => 'rainbowkitty'.$i,
                'password' => Hash::make('sparklesparklejazz'),
                'email' => 'test'.$i.'@email.com',
                'name' => 'John Smith, #'.$i,
                'avatar' => 'images/rainbowkitty'.$i.'/'.$fileName,
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
                'ingredients' => "Butter, Dough, Oven, and a Smile",
                'image_url' => '/images/buttered_crumpets.jpg'
        ));

        Recipe::create(array(
                'title' => "Mom's pea soup",
                'description' => 'Gotta love mom\'s homemade soup, there is notthing like it.',
                'author_id' => 1,
                'instructions' => "Boil water. Throw in split peas, carrots, ham, potatoes, onion, garlic. Cook until vegetables are soft. Season with salt and pepper.",
                'ingredients' => "Water, split peas, carrots, potatoes, ham, onion, garlic, salt",
                'image_url' => '/images/Green_Pea_Soup.jpg'
        ));
        Recipe::create(array(
                'title' => 'Homemade Chicken Pot Pie',
                'description' => 'Be careful with this recipe. It just might be too delicious for a mere mortal to handle.',
                'author_id' => 1,
                'instructions' => "Heat it up in the microwave.",
                'ingredients' => "Get a frozen chicken pot pie from the grocery store.",
                'image_url' => '/images/Chicken_Pot_Pie.jpg'
        ));
        Recipe::create(array(
                'title' => 'Sushi Alaska Roll',
                'description' => 'Who doesn\'t like sushi?',
                'author_id' => 2,
                'instructions' => "Roll up some salmon, cucumber, and avocado in rice and seaweed.",
                'ingredients' => "Rice, seaweed, salmon, cucumber, avocado, sugar, vinegar",
                'image_url' => '/images/Alaska_Sushi.jpg'
        ));
                Recipe::create(array(
                'title' => 'Eggs Benedict',
                'description' => 'Be careful, no one knows if these eggs will betray you.',
                'author_id' => 3,
                'instructions' => "fry your egg and serve with the declaration of independence as a garnish",
                'ingredients' => "eggs,oil,the declaration of independence",
                'image_url' => '/images/Eggs_Benedict.jpg'
        ));
                Recipe::create(array(
                'title' => 'Creamy Macaroni and Cheese',
                'description' => 'So cheesy it might make you queasy',
                'author_id' => 4,
                'instructions' => "Cook some noodles, then melt some cheese in them.",
                'ingredients' => "Noodles, heavy cream, cheese",
                'image_url' => '/images/Creamy_Macaroni_and_Cheese.jpg'
        ));
        Recipe::create(array(
                'title' => 'Coffee-marinated Pork Chops',
                'description' => 'Delicious porkchops with the added bonus of liquid energy!',
                'author_id' => 2,
                'instructions' => "Marinate pork chops in coffee marinade over night (12+ hours). Grill over flame til desired doneness.",
                'ingredients' => "Coffee, worcestershire sauce, pork chops",
        ));
        Recipe::create(array(
                'title' => 'Chocolate Chip Pancakes',
                'description' => 'Buttermilk pancakes with chocolate chips',
                'author_id' => 3,
                'instructions' => "Mix ingredients in a bowl until smooth, ",
                'ingredients' => "Flour, Eggs, Milk, Baking Soda, Chocolate Chips",
        ));
        Recipe::create(array(
                'title' => 'Bowl of Cereal',
                'description' => 'Generic and boring bowl of grey cereal in grey bowl with a grey spoon.',
                'author_id' => 3,
                'instructions' => "Pour cereal in bowl, then pour milk in bowl.",
                'ingredients' => "Cereal, milk",
        ));
        Recipe::create(array(
                'title' => 'Cheesy Macaroni and Cheese',
                'description' => 'Even cheesier than my jokes!',
                'author_id' => 4,
                'instructions' => "Cook some noodles, then melt some cheese in them.",
                'ingredients' => "Noodles, Cheese, salt, pepper",
        ));
        Recipe::create(array(
                'title' => 'Old fashioned',
                'description' => 'This drink will take you back in time to the year 1934',
                'author_id' => 4,
                'instructions' => "Mix sugar, water and angostura bitters in an old-fashioned glass. 
                Drop in a cherry and an orange wedge. Muddle into a paste using a muddler or the back end of a spoon. 
                Pour in bourbon, fill with ice cubes, and stir.",              
                'ingredients' => "Bourbon, bitters, water, sugar, a cherry, and an orange wedge",
        ));
        Recipe::create(array(
                'title' => 'Worcester Steak',
                'description' => 'Like the place in england I think',
                'author_id' => 5,
                'instructions' => "Marinate steak overnight in secret worcestershire-style sauce. Grill over flame til desired doneness",
                'ingredients' => "Worcestershire sauce, steak, cumin, salt, pepper,"
        ));
        Recipe::create(array(
                'title' => "Grandma's Pecan Pie",
                'description' => 'Better than mom\'s, but don\'t tell her that',
                'author_id' => 6,
                'instructions' => "A whole lot of candied pecans in a pie shell. Bake at 350 deg F for 40 minutes.",
                'ingredients' => "Candied pecans, pie crust",
        ));
        Recipe::create(array(
                'title' => 'The Best Philly Cheesesteak',
                'description' => 'I got this recipe from my friend in Philly',
                'author_id' => 7,
                'instructions' => "Put the meat on the cheesy bread and eat it.",
                'ingredients' => "Meat, cheesy bread",
        ));
        Recipe::create(array(
                'title' => 'Cheesy Cheese Pizza',
                'description' => 'Extra cheese please. I\'m begging you, I\'m on my knees',
                'author_id' => 7,
                'instructions' => "Roll dough, put on sauce, put on cheese, bake in 400 degree Fahrenheit oven for 20 minutes",
                'ingredients' => "Water, flour, pizza sauce, mozzarella cheese",
        ));
        
        for($i = 1; $i < 100; $i++){
        	$recipe = array(
                'title' => 'Secret Bread Recipe #'.$i,
                'description' => 'This is a secret delicious recipe for bread.',
                'author_id' => $i,
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
class RatingTableSeeder extends Seeder {

	public function run()
	{
		DB::table('rating')->delete();
		$rating = 0;
		for($i = 1; $i < 100; $i++){
        	for($j = 1; $j <100; $j++){
				$ratings =(array(
					'user_id' => $i,
					'recipe_id' => $j,
					'rating' => rand(1,5)
				));
				Rating::create($ratings);
				$controller = new RatingController();
				$rating = $controller->getRating($j);
				
				$recipe = Recipe::find($j);
				//store the new rating and save it
				$recipe->rating = $rating;
				$recipe->save();
			}
    	}
	}
}

class RoleTableSeeder extends Seeder {

	public function run()
	{
		DB::table('role')->delete();
		DB::table('role_user')->delete();
		Role::create(array(
			'title' => 'admin'
			));
		Role::create(array(
			'title' => 'mod'
			));
		Role::create(array(
			'title' => 'user'
			));
		//$user_role = DB::table('role')->where('title', '=', 'user')->first();
		//$admin_role = DB::table('role')->where('title', '=', 'admin')->first();
		foreach (User::all() as $user){
			if($user->id == 1)
				RoleUser::create(array(
					'user_id' => $user->id,
					'role_id' => 1
				));
			else 
				RoleUser::create(array(
					'user_id' => $user->id,
					'role_id' => 3
			));
		}
	}
}

class NotificationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('notifications')->delete();
        foreach(User::all() as $user){
            Notification::create(array(
                'user_id'       => $user->id,
                'link'          => 'profile',
                'icon'          => 'icon-bell',
                'acknowledged'  => FALSE,
                'content'       => "Welcome to digidiet, ".$user->username. 
                                "! Click here to view your new profile and start cooking."
                ));
        }
    }
}