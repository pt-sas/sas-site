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

		$this->new_title = 'Product Group';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
			'principal'	=> $principal->findAll()
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
		$eProductgroup = new \App\Entities\Productgroup();

		$productgroup = new M_Productgroup();
		$post = $this->request->getVar();

		try {
			$eProductgroup->fill($post);
			$eProductgroup->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'productgroup')) {
				$response =	$this->field->errorValidation($this->table);
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
				$response =	$this->field->errorValidation($this->table);
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
