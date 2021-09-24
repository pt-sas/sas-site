<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Menu;

class Menu extends BaseController
{
	protected $table = 'sys_menu';

	public function index()
	{
		return $this->template->render('backend/configuration/menu/v_menu');
	}

	public function showAll()
	{
		$menu = new M_Menu();
		$list = $menu->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->sys_menu_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
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
		$eMenu = new \App\Entities\Menu();

		$menu = new M_Menu();
		$post = $this->request->getVar();

		try {
			$eMenu->fill($post);
			$eMenu->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'menu')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $menu->save($eMenu);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function show($id)
	{
		$menu = new M_Menu();
		$list = $menu->where('sys_menu_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eMenu = new \App\Entities\Menu();

		$menu = new M_Menu();
		$post = $this->request->getVar();

		try {
			$eMenu->fill($post);
			$eMenu->sys_menu_id = $post['id'];
			$eMenu->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'menu')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $menu->save($eMenu);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function destroy($id)
	{
		$menu = new M_Menu();

		try {
			$result = $menu->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}
}
