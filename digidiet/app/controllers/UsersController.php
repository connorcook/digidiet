<?php

class UsersController extends BaseController {

	public $restful = true;


	public function get_index() {
		$users = User::all();
        return View::make('usertestpage')->with('users',$users);
	}
}