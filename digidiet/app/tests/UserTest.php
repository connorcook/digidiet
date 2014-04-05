<?php

class UserTest extends TestCase {

	public function testIndex()
	{
		//call the index function
		$this->call('GET', '/user');
		//test that response is ok
		$this->assertResponseOK();
		//test that the view has at least one user
		$this->assertViewHas('users');
	}
	
	public function testCreate()
	{
		//call the create function
		$this->call('GET', '/user/create');
		$this->assertResponseOK();
		// $this->assertRedirectedTo('register');
	
	}
	
	public function testStore()
	{
		$post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion', 'image' =>'test.jpg', 'location' => 'location');
		$this->call('POST', '/user', $post_data);
		$this->assertResponseOK();
		$user = User::where('username', '=', 'testDelete')->get();
		//$id = $user->id;
		
		$this->call('DELETE', '/user/'.$user[0]->id);
	
	}
	
	public function testShow()
	{
		
		$post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion','image' =>'test.jpg', 'location' => 'location');
		$this->call('POST', '/user', $post_data);
		$user = User::where('username', '=', 'testDelete')->get();
		$this->call('GET', '/user/'.$user[0]->id);
		$this->assertResponseOK();
		$this->call('DELETE', '/user/'.$user[0]->id);
	}
	
	public function testUpdate()
	{
	
	}
	
	public function testEdit()
	{
		$this->call('GET', '/user/edit');
		$this->assertResponseOK();
		
	}
	
	public function testDestroy()
	{
		//create a user to test delete
		$post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion','image' =>'test.jpg', 'location' => 'location');
		$this->call('POST', '/user', $post_data);
		$user = User::where('username', '=', 'testDelete')->get();
		
		
		$this->call('DELETE', '/user/'.$user[0]->id);
		// $crawler = $this->call('GET', '/user');
		// $this->assertCount(0, $crawler->filter('html:contains("testDelete")'));
	}



}