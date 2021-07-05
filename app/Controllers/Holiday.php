<?php

namespace App\Controllers;
use App\Models\M_Holiday;

class Holiday extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Holiday';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/holiday/v_holiday', $data);
	}

	public function showAll()
	{
			$holiday = new M_Holiday();
			$list = $holiday->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_holiday_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = $value['md_holiday_date'];
					$row[] = truncate($value['md_holiday_description']);
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
			$holiday = new M_Holiday();
			$post = $this->request->getVar();

			$active = isset($post['holiday_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_holiday_date' 				=> $post['holiday_date'],
							'md_holiday_description' 	=> $post['holiday_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'holiday')) {
							$response = $holiday->formError();
					} else {
							$result = $holiday->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$holiday = new M_Holiday();
			$list = $holiday->where('md_holiday_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'holiday_date',
									'label'        =>   $value['md_holiday_date']
							],
							[
									'field'        =>   'holiday_description',
									'label'        =>   $value['md_holiday_description']
							],
							[
									'field'        =>   'holiday_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$holiday = new M_Holiday();
			$post = $this->request->getVar();

			$active = isset($post['holiday_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_holiday_id'   				=> $post['id'],
							'md_holiday_date' 				=> $post['holiday_date'],
							'md_holiday_description' 	=> $post['holiday_description'],
							'isactive'     						=> $active
					];

					if (!$validation->run($post, 'holiday')) {
							$response = $holiday->formError();
					} else {
							$result = $holiday->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$holiday = new M_Holiday();

			try {
					$result = $holiday->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
