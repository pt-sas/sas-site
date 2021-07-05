<?php

namespace App\Controllers;
use App\Models\M_Region;

class Region extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Region';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];
		echo view('backend/masterdata/region/v_region', $data);
	}

	public function showAll()
	{
			$region = new M_Region();
			$list = $region->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_region_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_region_name']);
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
			$region = new M_Region();
			$post = $this->request->getVar();

			$active = isset($post['region_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_region_name' 				=> $post['region_name'],
							'md_region_description' => $post['region_description'],
							'isactive'     					=> $active
					];

					if (!$validation->run($post, 'region')) {
							$response = $region->formError();
					} else {
							$result = $region->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$region = new M_Region();
			$list = $region->where('md_region_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'region_name',
									'label'        =>   $value['md_region_name']
							],
							[
									'field'        =>   'region_description',
									'label'        =>   $value['md_region_description']
							],
							[
									'field'        =>   'region_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$region = new M_Region();
			$post = $this->request->getVar();

			$active = isset($post['region_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_region_id'   				=> $post['id'],
							'md_region_name' 				=> $post['region_name'],
							'md_region_description' => $post['region_description'],
							'isactive'     					=> $active
					];

					if (!$validation->run($post, 'region')) {
							$response = $region->formError();
					} else {
							$result = $region->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$region = new M_Region();

			try {
					$result = $region->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
