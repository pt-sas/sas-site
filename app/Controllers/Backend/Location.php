<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Location;

class Location extends BaseController
{
	protected $table = 'md_location';

	public function index()
	{
		$location = new M_Location();

		$this->new_title = 'Location';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
			'location' 	=> $location->findAll()
		];
		return $this->template->render('backend/location/v_location', $data);
	}

	public function showAll()
	{
		$location = new M_Location();
		$list = $location->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->md_location_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
			$row[] = $value->phone;
			$row[] = active($value->isactive);
			$row[] = '<center>
						<a class="btn" onclick="Edit(' . "'" . $ID . "'" . ')" title="Edit"><i class="far fa-edit text-info"></i></a>
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
		$eLocation = new \App\Entities\Location();

		$location = new M_Location();
		$post = $this->request->getVar();

		try {
			$eLocation->fill($post);
			$eLocation->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'location')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $location->save($eLocation);
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
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eLocation = new \App\Entities\Location();

		$location = new M_Location();
		$post = $this->request->getVar();

		try {
			$eLocation->fill($post);
			$eLocation->md_location_id = $post['id'];
			$eLocation->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'location')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $location->save($eLocation);
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
