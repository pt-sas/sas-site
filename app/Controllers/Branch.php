<?php

namespace App\Controllers;
use App\Models\M_Branch;
use App\Models\M_Region;

class Branch extends BaseController
{
	public function index()
	{
		$region = new M_Region();

		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Branch';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
			'region' 		=> $region->findAll()
		];
		echo view('backend/masterdata/branch/v_branch', $data);
	}

	public function showAll()
	{
			$branch = new M_Branch();
			$list = $branch->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_branch_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = truncate($value['md_region_id']);
					$row[] = truncate($value['md_branch_name']);
					$row[] = truncate($value['md_branch_address']);
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
			$branch = new M_Branch();
			$post = $this->request->getVar();

			$active = isset($post['branch_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_branch_name' 		=> $post['branch_name'],
							'md_branch_address' => $post['branch_address'],
							'md_branch_phone' 	=> $post['branch_phone'],
							'md_region_id' 			=> $post['region_id'],
							'isactive'     			=> $active
					];

					if (!$validation->run($post, 'branch')) {
							$response = $branch->formError();
					} else {
							$result = $branch->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$branch = new M_Branch();
			$list = $branch->where('md_branch_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'region_id',
									'label'        =>   $value['md_region_id']
							],
							[
									'field'        =>   'branch_name',
									'label'        =>   $value['md_branch_name']
							],
							[
									'field'        =>   'branch_address',
									'label'        =>   $value['md_branch_address']
							],
							[
									'field'        =>   'branch_phone',
									'label'        =>   $value['md_branch_phone']
							],
							[
									'field'        =>   'branch_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$branch = new M_Branch();
			$post = $this->request->getVar();

			$active = isset($post['branch_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_branch_id'   		=> $post['id'],
							'md_branch_name' 		=> $post['branch_name'],
							'md_branch_address' => $post['branch_address'],
							'md_branch_phone' 	=> $post['branch_phone'],
							'md_region_id' 			=> $post['region_id'],
							'isactive'     			=> $active
					];

					if (!$validation->run($post, 'branch')) {
							$response = $branch->formError();
					} else {
							$result = $branch->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$branch = new M_Branch();

			try {
					$result = $branch->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
