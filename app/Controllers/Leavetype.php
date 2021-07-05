<?php

namespace App\Controllers;
use App\Models\M_Leavetype;

class Leavetype extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Leave Type';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/leavetype/v_leavetype', $data);
	}

	public function showAll()
	{
			$leavetype = new M_Leavetype();
			$list = $leavetype->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_leavetype_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_leavetype_name']);
					$row[] = truncate($value['md_leavetype_description']);
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
			$leavetype = new M_Leavetype();
			$post = $this->request->getVar();

			$active = isset($post['leavetype_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_leavetype_name' 				=> $post['leavetype_name'],
							'md_leavetype_description' 	=> $post['leavetype_description'],
							'isactive'     							=> $active
					];

					if (!$validation->run($post, 'leavetype')) {
							$response = $leavetype->formError();
					} else {
							$result = $leavetype->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$leavetype = new M_Leavetype();
			$list = $leavetype->where('md_leavetype_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'leavetype_name',
									'label'        =>   $value['md_leavetype_name']
							],
							[
									'field'        =>   'leavetype_description',
									'label'        =>   $value['md_leavetype_description']
							],
							[
									'field'        =>   'leavetype_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$leavetype = new M_Leavetype();
			$post = $this->request->getVar();

			$active = isset($post['leavetype_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_leavetype_id'   				=> $post['id'],
							'md_leavetype_name' 				=> $post['leavetype_name'],
							'md_leavetype_description' 	=> $post['leavetype_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'leavetype')) {
							$response = $leavetype->formError();
					} else {
							$result = $leavetype->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$leavetype = new M_Leavetype();

			try {
					$result = $leavetype->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
