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
		$post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion');
		$this->call('POST', '/user/store', $post_data);
		$this->assertResponseOK();
		$this->call('DELETE', '/user/destroy', $id);
	
	}
	
	public function testShow()
	{
		
		$post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion');
		$this->call('POST', '/user/store', $post_data);
		$user = User::where('username', '=', 'testDelete');
		$id = $user->id;	//may need to make this an array
		$this->call('GET', '/user/show', $id);
		$this->assertResponseOK();
		$this->call('DELETE', '/user/destroy', $id);
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
		$post_data = array('username' => 'testDelete', 'password' => 'testDelete', 'name' => 'Test Delete', 'about_me' => 'Test user for deletion');
		$this->call('POST', '/user/store', $post_data);
		$user = User::where('username', '=', 'testDelete');
		$id = $user->id;		
		//now test delete
		$this->call('DELETE', '/user/destroy', $id);
		$crawler = $this->call('GET', '/user');
		$this->assertCount(0, $crawler->filter('html:contains("testDelete")'));
	}



}