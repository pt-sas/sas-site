<?php

namespace App\Controllers;
use App\Models\M_Workingdays;

class Workingdays extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Working Days';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/workingdays/v_workingdays', $data);
	}

	public function showAll()
	{
			$workingdays = new M_Workingdays();
			$list = $workingdays->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_workingdays_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_workingdays_name']);
					$row[] = $value['md_workingdays_timein'];
					$row[] = $value['md_workingdays_timeout'];
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
			$workingdays = new M_Workingdays();
			$post = $this->request->getVar();

			$active = isset($post['workingdays_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_workingdays_name' 				=> $post['workingdays_name'],
							'md_workingdays_timein' 			=> $post['workingdays_timein'],
							'md_workingdays_timeout' 			=> $post['workingdays_timeout'],
							'md_workingdays_description'	=> $post['workingdays_description'],
							'isactive'     								=> $active
					];

					if (!$validation->run($post, 'workingdays')) {
							$response = $workingdays->formError();
					} else {
							$result = $workingdays->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$workingdays = new M_Workingdays();
			$list = $workingdays->where('md_workingdays_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'workingdays_name',
									'label'        =>   $value['md_workingdays_name']
							],
							[
									'field'        =>   'workingdays_timein',
									'label'        =>   $value['md_workingdays_timein']
							],
							[
									'field'        =>   'workingdays_timeout',
									'label'        =>   $value['md_workingdays_timeout']
							],
							[
									'field'        =>   'workingdays_description',
									'label'        =>   $value['md_workingdays_description']
							],
							[
									'field'        =>   'workingdays_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$workingdays = new M_Workingdays();
			$post = $this->request->getVar();

			$active = isset($post['workingdays_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_workingdays_id'   				=> $post['id'],
							'md_workingdays_name' 				=> $post['workingdays_name'],
							'md_workingdays_timein' 			=> $post['workingdays_timein'],
							'md_workingdays_timeout' 			=> $post['workingdays_timeout'],
							'md_workingdays_description'	=> $post['workingdays_description'],
							'isactive'     								=> $active
					];

					if (!$validation->run($post, 'workingdays')) {
							$response = $workingdays->formError();
					} else {
							$result = $workingdays->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$workingdays = new M_Workingdays();

			try {
					$result = $workingdays->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
