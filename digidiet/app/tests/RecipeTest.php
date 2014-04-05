<?php

class RecipeTest extends TestCase {

	public function testIndex()
	{
		//call the index function
		$this->call('GET', '/recipe');
		//test that response is ok
		$this->assertResponseOK();
		//test that the view has at least one user
		$this->assertViewHas('recipes');
	}
	
	public function testCreate()
	{
	
		//check that redirected if not logged in
		$this->client->request('GET', '/recipe/create');
		$this->assertRedirectedTo('recipe');
		//check logged in
		$post_data = array('username' => 'admin', 'password' => 'devdes');
		$this->client->request('POST', '/login', $post_data);
		//call the create function
		$crawler = $this->client->request('GET', '/recipe/create');
		$this->assertResponseOK();
		
		// $this->assertRedirectedTo('register');
	
	}
	
	public function testStore()
	{
		
		$post_login = array('username' => 'admin', 'password' => 'devdes');
		$this->client->request('POST', '/login', $post_login);
		
		$post_data = array('title' => 'testRecipe', 'description' => 'so delicious', 'ingredients' => 'blood, sweat, tears', 'instructions' => 'bake for 24 hours');
		$this->call('POST', '/recipe', $post_data);
		$this->assertRedirectedTo('/');
		$recipe = Recipe::where('title', '=', 'testRecipe')->get();
		//$id = $user->id;
		
		//$this->call('DELETE', '/recipe/'.$recipe[0]->id);
	
	}
	
	public function testShow()
	{
		//create user to test display
		// $post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion','image' =>'test.jpg', 'location' => 'location');
		// $this->call('POST', '/user', $post_data);
		$recipe = Recipe::where('title', '=', 'testRecipe')->get();
		//call show on the recipe
		$this->call('GET', '/recipe/'.$recipe[0]->id);
		//check response was ok
		$this->assertResponseOK();
		//clean up the dummy user
		// $this->call('DELETE', '/user/'.$user[0]->id);
	}
	
	public function testUpdate()
	{
		//insert user to test update on
		// $post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion','image' =>'test.jpg', 'location' => 'location');
		// $this->call('POST', '/user', $post_data);	
		// $user = User::where('username', '=', 'testDelete2')->get();
		
		// $put_data = array('username' => 'testDelete2', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion','image' =>'test.jpg', 'location' => 'location');
		// $this->call('PUT', '/user', $put_data);
		
		// $this->call('DELETE', '/user/'.$user[0]->id);
		
	}
	
	// public function testEdit()
	// {
		// $this->call('GET', '/recipe/edit');
		// $this->assertResponseOK();
		
	// }
	
	public function testDestroy()
	{
		//create a user to test delete
		
		$recipe = Recipe::where('title', '=', 'testRecipe')->get();
		
		
		$this->call('DELETE', '/recipe/'.$recipe[0]->id);
		$crawler = $this->client->request('GET', '/recipe');
		$this->assertCount(0, $crawler->filter('html:contains("testRecipe")'));
	}



}







