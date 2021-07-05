<?php

namespace App\Controllers;
use App\Models\M_Massleave;

class Massleave extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Mass Leave';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/massleave/v_massleave', $data);
	}

	public function showAll()
	{
			$massleave = new M_Massleave();
			$list = $massleave->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_massleave_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = $value['md_massleave_date'];
					$row[] = truncate($value['md_massleave_description']);
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
			$massleave = new M_Massleave();
			$post = $this->request->getVar();

			$active = isset($post['massleave_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_massleave_date' 				=> $post['massleave_date'],
							'md_massleave_description' 	=> $post['massleave_description'],
							'isactive'     							=> $active
					];

					if (!$validation->run($post, 'massleave')) {
							$response = $massleave->formError();
					} else {
							$result = $massleave->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$massleave = new M_Massleave();
			$list = $massleave->where('md_massleave_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'massleave_date',
									'label'        =>   $value['md_massleave_date']
							],
							[
									'field'        =>   'massleave_description',
									'label'        =>   $value['md_massleave_description']
							],
							[
									'field'        =>   'massleave_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$massleave = new M_Massleave();
			$post = $this->request->getVar();

			$active = isset($post['massleave_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_massleave_id'   				=> $post['id'],
							'md_massleave_date' 				=> $post['massleave_date'],
							'md_massleave_description' 	=> $post['massleave_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'massleave')) {
							$response = $massleave->formError();
					} else {
							$result = $massleave->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$massleave = new M_Massleave();

			try {
					$result = $massleave->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
