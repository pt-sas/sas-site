<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Division;

class Division extends BaseController
{
	protected $table = 'md_division';

	public function index()
	{
		return $this->template->render('backend/division/v_division');
	}

	public function showAll()
	{
		$division = new M_Division();
		$list = $division->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->md_division_id;

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
		$eDivision = new \App\Entities\Division();

		$division = new M_Division();
		$post = $this->request->getVar();

		try {
			$eDivision->fill($post);
			$eDivision->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'division')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $division->save($eDivision);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$division = new M_Division();
		$list = $division->where('md_division_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eDivision = new \App\Entities\Division();

		$division = new M_Division();
		$post = $this->request->getVar();

		try {
			$eDivision->fill($post);
			$eDivision->md_division_id = $post['id'];
			$eDivision->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'division')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $division->save($eDivision);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function destroy($id)
	{
		$division = new M_Division();

		try {
			$result = $division->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
