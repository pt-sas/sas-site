<?php

namespace App\Controllers;
use App\Models\M_Position;

class Position extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Position';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/position/v_position', $data);
	}

	public function showAll()
	{
			$position = new M_Position();
			$list = $position->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_position_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_position_name']);
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
			$position = new M_Position();
			$post = $this->request->getVar();

			$active = isset($post['position_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_position_name' 				=> $post['position_name'],
							'md_position_description' => $post['position_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'position')) {
							$response = $position->formError();
					} else {
							$result = $position->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$position = new M_Position();
			$list = $position->where('md_position_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'position_name',
									'label'        =>   $value['md_position_name']
							],
							[
									'field'        =>   'position_description',
									'label'        =>   $value['md_position_description']
							],
							[
									'field'        =>   'position_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$position = new M_Position();
			$post = $this->request->getVar();

			$active = isset($post['position_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_position_id'   				=> $post['id'],
							'md_position_name' 				=> $post['position_name'],
							'md_position_description' => $post['position_description'],
							'isactive'     => $active
					];

					if (!$validation->run($post, 'position')) {
							$response = $position->formError();
					} else {
							$result = $position->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$position = new M_Position();

			try {
					$result = $position->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
