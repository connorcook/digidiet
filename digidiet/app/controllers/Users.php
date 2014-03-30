<?php

class UsersController extends BaseController {

	public $restful = true;

	public function get_index() {
        return View::make('users.index');
	}
}