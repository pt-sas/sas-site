<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Role;
use App\Models\M_Menu;
use App\Models\M_Submenu;
use App\Models\M_AccessMenu;

class Role extends BaseController
{
	protected $table = 'sys_role';

	public function index()
	{
		$menu = new M_Menu();
		$submenu = new M_Submenu();

		$this->new_title = 'Role';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'menu'		=> $menu->where('isactive', 'Y')
				->orderBy('name', 'ASC')
				->findAll(),
			'submenu'	=> $submenu->where('isactive', 'Y')
				->orderBy('name', 'ASC')
				->findAll()
		];

		return $this->template->render('backend/configuration/role/v_role', $data);
	}

	public function showAll()
	{
		$role = new M_Role();
		$list = $role->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->sys_role_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
			$row[] = $value->description;
			$row[] = active($value->isactive);
			$row[] = '<center>
						<a class="btn" onclick="Edit(' . "'" . $ID . "'" . ')" title="Edit"><i class="far fa-edit text-info"></i></a>
						<a class="btn" onclick="Destroy(' . "'" . $ID . "'" . ')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
					</center>';
			$data[] = $row;
		endforeach;

		$result = ['data' => $data];
		return json_encode($result);
	}

	public function create()
	{
		$validation = \Config\Services::validation();
		$eRole = new \App\Entities\Role();

		$role = new M_Role();
		$access = new M_AccessMenu();
		$post = $this->request->getVar();

		try {
			$eRole->fill($post);
			$eRole->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'role')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $role->save($eRole);

				$post['sys_role_id'] = $role->insertID();
				$access->create($post);

				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function show($id)
	{
		$role = new M_Role();
		$list = $role->detail($this->table . '.sys_role_id', $id)->getResult();
		$reponse = $this->field->store($this->table, $list, 'table');
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eRole = new \App\Entities\Role();

		$role = new M_Role();
		$access = new M_AccessMenu();
		$post = $this->request->getVar();

		try {
			$eRole->fill($post);
			$eRole->sys_role_id = $post['id'];
			$eRole->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'role')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $role->save($eRole);

				$post['sys_role_id'] = $post['id'];
				$access->create($post);

				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function destroy($id)
	{
		$role = new M_Role();
		$access = new M_AccessMenu();

		try {
			$result = $role->delete($id);

			$access->where('sys_role_id', $id)->delete();

			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}
}
