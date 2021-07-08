<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function login()
	{
		$this->new_title = 'Login';

		$data = [
			'title'    	=>'' . $this->new_title . '',
		];
		echo view('backend/auth/login', $data);
	}

	public function register()
	{
		$this->new_title = 'Login';

		$data = [
			'title'    	=>'' . $this->new_title . '',
		];
		echo view('backend/auth/register', $data);
	}

	public function logout()
	{
		return redirect()->to(base_url('auth/login'));
	}
}
