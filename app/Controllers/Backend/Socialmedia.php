<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Socialmedia;

class Socialmedia extends BaseController
{
	protected $table = 'md_socialmedia';

	public function index()
	{
		$this->new_title = 'Social Media';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		return $this->template->render('backend/socialmedia/v_socialmedia', $data);
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
