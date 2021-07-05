<?php

namespace App\Controllers;
use App\Models\M_Division;

class Division extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Division';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/division/v_division', $data);
	}

	public function showAll()
	{
			$division = new M_Division();
			$list = $division->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_division_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_division_name']);
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
			$division = new M_Division();
			$post = $this->request->getVar();

			$active = isset($post['division_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_division_name' 				=> $post['division_name'],
							'md_division_description' => $post['division_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'division')) {
							$response = $division->formError();
					} else {
							$result = $division->save($data);
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

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'division_name',
									'label'        =>   $value['md_division_name']
							],
							[
									'field'        =>   'division_description',
									'label'        =>   $value['md_division_description']
							],
							[
									'field'        =>   'division_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$division = new M_Division();
			$post = $this->request->getVar();

			$active = isset($post['division_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_division_id'   				=> $post['id'],
							'md_division_name' 				=> $post['division_name'],
							'md_division_description' => $post['division_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'division')) {
							$response = $division->formError();
					} else {
							$result = $division->save($data);
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
