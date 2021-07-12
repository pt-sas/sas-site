<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Division;

class Division extends BaseController
{
	protected $table = 'md_division';

	public function index()
	{
		$this->new_title = 'Product Group';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		return $this->template->render('backend/division/v_division', $data);
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
			$row[] = '<center>
						<a class="btn" onclick="Edit(' . "'" . $ID . "'" . ')" title="Edit"><i class="far fa-edit text-info"></i></a>
						<a class="btn" onclick="Destroy(' . "'" . $ID . "'" . ')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
					</center>';
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
