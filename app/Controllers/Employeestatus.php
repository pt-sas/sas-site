<?php

namespace App\Controllers;
use App\Models\M_Employeestatus;

class Employeestatus extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Employee Status';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/employeestatus/v_employeestatus', $data);
	}

	public function showAll()
	{
			$employeestatus = new M_Employeestatus();
			$list = $employeestatus->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_employeestatus_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_employeestatus_name']);
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
			$employeestatus = new M_Employeestatus();
			$post = $this->request->getVar();

			$active = isset($post['employeestatus_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_employeestatus_name' 				=> $post['employeestatus_name'],
							'md_employeestatus_description' => $post['employeestatus_description'],
							'isactive'     									=> $active
					];

					if (!$validation->run($post, 'employeestatus')) {
							$response = $employeestatus->formError();
					} else {
							$result = $employeestatus->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$employeestatus = new M_Employeestatus();
			$list = $employeestatus->where('md_employeestatus_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'employeestatus_name',
									'label'        =>   $value['md_employeestatus_name']
							],
							[
									'field'        =>   'employeestatus_description',
									'label'        =>   $value['md_employeestatus_description']
							],
							[
									'field'        =>   'employeestatus_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$employeestatus = new M_Employeestatus();
			$post = $this->request->getVar();

			$active = isset($post['employeestatus_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_employeestatus_id'   				=> $post['id'],
							'md_employeestatus_name' 				=> $post['employeestatus_name'],
							'md_employeestatus_description' => $post['employeestatus_description'],
							'isactive'     => $active
					];

					if (!$validation->run($post, 'employeestatus')) {
							$response = $employeestatus->formError();
					} else {
							$result = $employeestatus->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$employeestatus = new M_Employeestatus();

			try {
					$result = $employeestatus->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
