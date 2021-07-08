<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Location;

class Location extends BaseController
{
	public function index()
	{
		$location = new M_Location();

		$this->new_title = 'Location';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
			'location' 	=> $location->findAll()
		];
		echo view('backend/location/v_location', $data);
	}

	public function showAll()
	{
			$location = new M_Location();
			$list = $location->findAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['md_location_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = $value['name'];
					$row[] = $value['phone'];
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
			$location = new M_Location();
			$post = $this->request->getVar();

			$active = isset($post['location_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'name' 				=> $post['location_name'],
							'description' => $post['location_description'],
							'location' 		=> $post['location_location'],
							'address1' 		=> $post['location_address1'],
							'subdistrict' => $post['location_subdistrict'],
							'district' 		=> $post['location_district'],
							'city' 				=> $post['location_city'],
							'province' 		=> $post['location_province'],
							'phone' 			=> $post['location_phone'],
							'cellular' 		=> $post['location_cellular'],
							'postal' 			=> $post['location_postal'],
							'longitude' 	=> $post['location_longitude'],
							'lattitude' 	=> $post['location_lattitude'],
							'isactive'    => $active
					];

					if (!$validation->run($post, 'location')) {
							$response = $location->formError();
					} else {
							$result = $location->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function show($id)
	{
			$location = new M_Location();
			$list = $location->where('md_location_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'location_name',
									'label'        =>   $value['name']
							],
							[
									'field'        =>   'location_description',
									'label'        =>   $value['description']
							],
							[
									'field'        =>   'location_location',
									'label'        =>   $value['location']
							],
							[
									'field'        =>   'location_address1',
									'label'        =>   $value['address1']
							],
							[
									'field'        =>   'location_subdistrict',
									'label'        =>   $value['subdistrict']
							],
							[
									'field'        =>   'location_district',
									'label'        =>   $value['district']
							],
							[
									'field'        =>   'location_city',
									'label'        =>   $value['city']
							],
							[
									'field'        =>   'location_province',
									'label'        =>   $value['province']
							],
							[
									'field'        =>   'location_phone',
									'label'        =>   $value['phone']
							],
							[
									'field'        =>   'location_cellular',
									'label'        =>   $value['cellular']
							],
							[
									'field'        =>   'location_postal',
									'label'        =>   $value['postal']
							],
							[
									'field'        =>   'location_longitude',
									'label'        =>   $value['longitude']
							],
							[
									'field'        =>   'location_lattitude',
									'label'        =>   $value['lattitude']
							],
							[
									'field'        =>   'location_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$location = new M_Location();
			$post = $this->request->getVar();

			$active = isset($post['location_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_location_id'	=> $post['id'],
							'name' 						=> $post['location_name'],
							'description' 		=> $post['location_description'],
							'location' 				=> $post['location_location'],
							'address1' 				=> $post['location_address1'],
							'subdistrict' 		=> $post['location_subdistrict'],
							'district' 				=> $post['location_district'],
							'city' 						=> $post['location_city'],
							'province' 				=> $post['location_province'],
							'phone' 					=> $post['location_phone'],
							'cellular' 				=> $post['location_cellular'],
							'postal' 					=> $post['location_postal'],
							'longitude' 			=> $post['location_longitude'],
							'lattitude' 			=> $post['location_lattitude'],
							'isactive'     		=> $active
					];

					if (!$validation->run($post, 'location')) {
							$response = $location->formError();
					} else {
							$result = $location->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$location = new M_Location();

			try {
					$result = $location->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
