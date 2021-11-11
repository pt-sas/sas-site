<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

use App\Models\M_User;

class Auth extends BaseController
{
	protected $table = 'sys_user';

	public function index()
	{
		$this->new_title = 'Login';

		$data = [
			'title'    	=> '' . $this->new_title . ''
		];

		echo view('backend/auth/login', $data);
	}

	public function login()
	{
		$validation = \Config\Services::validation();
		$eUser = new \App\Entities\User();

		$user = new M_User();

		$post = $this->request->getVar();

		try {
			if (!$validation->run($post, 'login')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$check = $this->access->checkLogin($post);

				if ($check == 3 || $check == 4) {
					$response = message('error', false, "User don't have access");
				} else if ($check == 0 || $check == 2) {
					$response = message('error', false, 'Wrong Username or Password');
				} else {
					if ($check == 1) {
						$eUser->datelastlogin = date('Y-m-d H:i:s');
						$eUser->sys_user_id = session()->get('sys_user_id');
						$user->save($eUser);

						$msg = 'Login successfully !';
					} else {
						$msg = $check;
					}

					$response = message('success', true, $msg);
				}
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(site_url('auth'));
	}

	public function change_password()
	{
		$validation = \Config\Services::validation();
		$eUser = new \App\Entities\User();

		$user = new M_User();

		$post = $this->request->getVar();

		if ($this->request->getMethod(true) === 'POST') {
			try {
				$eUser->password = $post['new_password'];
				$eUser->updated_at = date('Y-m-d H:i:s');
				$eUser->datepasswordchange = date('Y-m-d H:i:s');
				$eUser->sys_user_id = session()->get('sys_user_id');

				if (!$validation->run($post, 'change_password')) {
					$response =	$this->field->errorValidation($this->table, $post);
				} else {
					$result = $user->save($eUser);
					$response = message('success', true, $result);
				}
			} catch (\Exception $e) {
				$response = message('error', false, $e->getMessage());
			}
		}

		return json_encode($response);
	}
}
