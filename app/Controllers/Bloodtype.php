<?php

namespace App\Controllers;
use App\Models\M_Bloodtype;

class Bloodtype extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Blood Type';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/bloodtype/v_bloodtype', $data);
	}

	public function showAll()
	{
			$bloodtype = new M_Bloodtype();
			$list = $bloodtype->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_bloodtype_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_bloodtype_name']);
					$row[] = active($value['isactive']);
					$row[] = '<center>
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
			$bloodtype = new M_Bloodtype();
			$post = $this->request->getVar();

			$active = isset($post['bloodtype_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_bloodtype_name' 				=> $post['bloodtype_name'],
							'md_bloodtype_description' 	=> $post['bloodtype_description'],
							'isactive'     							=> $active
					];

					if (!$validation->run($post, 'bloodtype')) {
							$response = $bloodtype->formError();
					} else {
							$result = $bloodtype->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$bloodtype = new M_Bloodtype();
			$list = $bloodtype->where('md_bloodtype_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'bloodtype_name',
									'label'        =>   $value['md_bloodtype_name']
							],
							[
									'field'        =>   'bloodtype_description',
									'label'        =>   $value['md_bloodtype_description']
							],
							[
									'field'        =>   'bloodtype_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$bloodtype = new M_Bloodtype();
			$post = $this->request->getVar();

			$active = isset($post['bloodtype_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_bloodtype_id'   				=> $post['id'],
							'md_bloodtype_name' 				=> $post['bloodtype_name'],
							'md_bloodtype_description' 	=> $post['bloodtype_description'],
							'isactive'     							=> $active
					];

					if (!$validation->run($post, 'bloodtype')) {
							$response = $bloodtype->formError();
					} else {
							$result = $bloodtype->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$bloodtype = new M_Bloodtype();

			try {
					$result = $bloodtype->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
