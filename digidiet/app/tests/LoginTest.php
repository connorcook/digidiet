<?php

class LoginTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	 
	 
	 public function testPageLoad()
	 
	 {
		$crawler = $this->client->request('GET', '/login');

		$this->assertTrue($this->client->getResponse()->isOk());
		
	 }
	 
	 public function testBadLogin()
	 {
		$post_data = array('username' => 'evilPerson', 'password' => 'wrongPassword');
		$this->client->request('POST', 'login', $post_data);
		$this->assertRedirectedTo('login');
	 }
	 
	 public function testGoodLogin()
	 {
		$post_data = array('username' => 'admin', 'password' => 'devdes');
		$this->client->request('POST', 'login', $post_data);
		$this->assertRedirectedTo('/');
	 }
	 
	 public function testLogOut()
	 
	 {
		$crawler = $this->client->request('GET', '/logout');

		$this->assertRedirectedTo('/');
	 
	 }
	 

	 
	 
	 
	 
	// public function testPWHashed()
	// {
		// Hash::shouldReceive('make')->once()->andReturn('hashed');
		// $user = new User;
		// $user->password = 'test';
		
		// $this->assertEquals('hashed', $user->password);
	// }
	
}
