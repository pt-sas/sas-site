<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Submenu;
use App\Models\M_Menu;

class Submenu extends BaseController
{
	protected $table = 'sys_submenu';

	public function index()
	{
		$menu = new M_Menu();

		$data = [
			'menu'		=> $menu->where('isactive', 'Y')
				->orderBy('name', 'ASC')
				->findAll()
		];

		return $this->template->render('backend/configuration/submenu/v_submenu', $data);
	}

	public function showAll()
	{
		$submenu = new M_Submenu();
		$list = $submenu->detail('sys_submenu.isactive', 'Y')->getResult();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->sys_submenu_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
			$row[] = $value->parent;
			$row[] = $value->url;
			$row[] = $value->sequence;
			$row[] = $value->icon;
			$row[] = active($value->isactive);
			$row[] = $this->template->table_button($ID);
			$data[] = $row;
		endforeach;

		$result = array('data' => $data);
		return json_encode($result);
	}

	public function create()
	{
		$validation = \Config\Services::validation();
		$eSubmenu = new \App\Entities\Submenu();

		$submenu = new M_Submenu();
		$post = $this->request->getVar();

		try {
			$eSubmenu->fill($post);
			$eSubmenu->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'submenu')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $submenu->save($eSubmenu);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function show($id)
	{
		$submenu = new M_Submenu();
		$list = $submenu->where('sys_submenu_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eSubmenu = new \App\Entities\Submenu();

		$submenu = new M_Submenu();
		$post = $this->request->getVar();

		try {
			$eSubmenu->fill($post);
			$eSubmenu->sys_submenu_id = $post['id'];
			$eSubmenu->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'submenu')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $submenu->save($eSubmenu);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function destroy($id)
	{
		$submenu = new M_Submenu();

		try {
			$result = $submenu->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}
}
