<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Promo;

class Promo extends BaseController
{
	protected $table = 'trx_promo';

	public function index()
	{
		$this->new_title = 'Promo';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
		];
		return $this->template->render('backend/promo/v_promo', $data);
	}

	public function showAll()
	{
		$promo = new M_Promo();
		$list = $promo->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->trx_promo_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->title;
			$row[] = $value->start_date;
			$row[] = $value->end_date;
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
		$ePromo = new \App\Entities\Promo();

		$promo = new M_Promo();
		$post = $this->request->getVar();

		try {
			$ePromo->fill($post);
			$ePromo->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'promo')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $promo->save($ePromo);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$promo = new M_Promo();
		$list = $promo->where('trx_promo_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$ePromo = new \App\Entities\Promo();

		$promo = new M_Promo();
		$post = $this->request->getVar();

		try {
			$ePromo->fill($post);
			$ePromo->trx_promo_id = $post['id'];
			$ePromo->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'promo')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $promo->save($ePromo);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function destroy($id)
	{
		$promo = new M_Promo();

		try {
			$result = $promo->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
