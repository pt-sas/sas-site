<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_User;
use App\Models\M_Role;
use App\Models\M_UserRole;

class User extends BaseController
{
	protected $table = 'sys_user';

	public function index()
	{
		$role = new M_Role();

		$data = [
			'role'		=> $role->where('isactive', 'Y')
				->orderBy('name', 'ASC')
				->findAll()
		];

		return $this->template->render('backend/configuration/user/v_user', $data);
	}

	public function showAll()
	{
		$user = new M_User();
		$list = $user->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->sys_user_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->username;
			$row[] = $value->name;
			$row[] = $value->description;
			$row[] = $value->email;
			$row[] = active($value->isactive);
			$row[] = $this->template->table_button($ID);
			$data[] = $row;
		endforeach;

		$result = ['data' => $data];

		return json_encode($result);
	}

	public function create()
	{
		$validation = \Config\Services::validation();
		$eUser = new \App\Entities\User();

		$user = new M_User();
		$uRole = new M_UserRole();
		$post = $this->request->getVar();

		try {
			$eUser->fill($post);
			$eUser->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'user')) {
				$list = $user->detail();
				$response =	$this->field->errorValidation($this->table, $list);
			} else {
				$result = $user->save($eUser);

				$post['role'] = explode(',', $post['role']);
				$post['sys_user_id'] = $user->insertID();

				$uRole->create($post);

				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function show($id)
	{
		$user = new M_User();
		$list = $user->detail([], 'sys_user.sys_user_id', $id);
		$response = $this->field->store($this->table, $list->getResult(), $list);
		return json_encode($response);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eUser = new \App\Entities\User();

		$user = new M_User();
		$uRole = new M_UserRole();
		$post = $this->request->getVar();

		$row = $user->find($post['id']);

		if ($row->password !== $post['password'])
			$row->password = $post['password'];

		try {
			$eUser->name = $post['name'];
			$eUser->username = $post['username'];
			$eUser->email = $post['email'];
			$eUser->description = $post['description'];

			// Check password has change true
			if ($row->hasChanged('password'))
				$eUser->password = $post['password'];

			$eUser->sys_user_id = $post['id'];
			$eUser->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'user')) {
				$list = $user->detail();
				$response =	$this->field->errorValidation($this->table, $list);
			} else {
				$result = $user->save($eUser);

				$post['role'] = explode(',', $post['role']);
				$post['sys_user_id'] = $post['id'];

				$uRole->create($post);

				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function destroy($id)
	{
		$user = new M_User();
		$uRole = new M_UserRole();

		try {
			$result = $user->delete($id);

			$result = $result ? $uRole->where('sys_user_id', $id)->delete() : false;

			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}
}
