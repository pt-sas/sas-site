<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Principal;
use App\Models\M_Productgroup;

class Productgroup extends BaseController
{
	protected $table = 'md_productgroup';

	public function index()
	{
		$principal = new M_Principal();

		$data = [
			'principal'	=> $principal->where('isactive', 'Y')->findAll()
		];

		return $this->template->render('backend/productgroup/v_productgroup', $data);
	}

	public function showAll()
	{
		$productgroup = new M_Productgroup();
		$list = $productgroup->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->md_productgroup_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
			$row[] = $value->md_principal_id;
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
		$eProductgroup = new \App\Entities\Productgroup();

		$productgroup = new M_Productgroup();
		$post = $this->request->getVar();

		try {
			$eProductgroup->fill($post);
			$eProductgroup->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'productgroup')) {
				$response =	$this->field->errorValidation($this->table, $post);
			} else {
				$result = $productgroup->save($eProductgroup);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$productgroup = new M_Productgroup();
		$list = $productgroup->where('md_productgroup_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eProductgroup = new \App\Entities\Productgroup();

		$productgroup = new M_Productgroup();
		$post = $this->request->getVar();

		try {
			$eProductgroup->fill($post);
			$eProductgroup->md_productgroup_id = $post['id'];
			$eProductgroup->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'productgroup')) {
				$response =	$this->field->errorValidation($this->table, $post);
			} else {
				$result = $productgroup->save($eProductgroup);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function destroy($id)
	{
		$productgroup = new M_Productgroup();

		try {
			$result = $productgroup->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
