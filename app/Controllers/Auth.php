<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function login()
	{
		echo view('backend/auth/login');
	}

	public function register()
	{
		echo view('backend/auth/register');
	}
}
