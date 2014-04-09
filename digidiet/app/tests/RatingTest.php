<?php

class RatingTest extends TestCase {

	public function testStore()
	{
		$login_data = array('username' => 'admin', 'password' => 'devdes');
		$this->client->request('POST', 'login', $login_data);
		$post_data = array('user_id' => 1, 'recipe_id' => 2, 'rating' => 3);
		//call the index function
		$this->client->request('POST', '/rate', $post_data);
		//test that response is ok
		//$this->assertResponseOK();
		//test that the view has at least one user
//		$this->assertViewHas('users');
	}
	
	public function testGetRating()
	{
		echo $this->call('GET', '/rating/3');
		$this->assertResponseOK();
		
	
	}
}