<?php

namespace App\Controllers;
use App\Models\M_Religion;

class Religion extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Religion';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/religion/v_religion', $data);
	}

	public function showAll()
	{
			$religion = new M_Religion();
			$list = $religion->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_religion_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_religion_name']);
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
			$religion = new M_Religion();
			$post = $this->request->getVar();

			$active = isset($post['religion_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_religion_name' 				=> $post['religion_name'],
							'md_religion_description' => $post['religion_description'],
							'isactive'     					=> $active
					];

					if (!$validation->run($post, 'religion')) {
							$response = $religion->formError();
					} else {
							$result = $religion->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$religion = new M_Religion();
			$list = $religion->where('md_religion_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'religion_name',
									'label'        =>   $value['md_religion_name']
							],
							[
									'field'        =>   'religion_description',
									'label'        =>   $value['md_religion_description']
							],
							[
									'field'        =>   'religion_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$religion = new M_Religion();
			$post = $this->request->getVar();

			$active = isset($post['religion_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_religion_id'   				=> $post['id'],
							'md_religion_name' 				=> $post['religion_name'],
							'md_religion_description' => $post['religion_description'],
							'isactive'     					=> $active
					];

					if (!$validation->run($post, 'religion')) {
							$response = $religion->formError();
					} else {
							$result = $religion->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$religion = new M_Religion();

			try {
					$result = $religion->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
