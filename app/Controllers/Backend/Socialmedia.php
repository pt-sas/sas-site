<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Socialmedia;

class Socialmedia extends BaseController
{
	protected $table = 'md_socialmedia';

	public function index()
	{
		return $this->template->render('backend/socialmedia/v_socialmedia');
	}

	public function showAll()
	{
		$socialmedia = new M_Socialmedia();
		$list = $socialmedia->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->md_socialmedia_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
			$row[] = $value->description;
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
		$eSocialmedia = new \App\Entities\Socialmedia();

		$socialmedia = new M_Socialmedia();
		$post = $this->request->getVar();

		try {
			$eSocialmedia->fill($post);
			$eSocialmedia->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'socialmedia')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $socialmedia->save($eSocialmedia);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$socialmedia = new M_Socialmedia();
		$list = $socialmedia->where('md_socialmedia_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eSocialmedia = new \App\Entities\Socialmedia();

		$socialmedia = new M_Socialmedia();
		$post = $this->request->getVar();

		try {
			$eSocialmedia->fill($post);
			$eSocialmedia->md_socialmedia_id = $post['id'];
			$eSocialmedia->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'socialmedia')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $socialmedia->save($eSocialmedia);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function destroy($id)
	{
		$socialmedia = new M_Socialmedia();

		try {
			$result = $socialmedia->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
