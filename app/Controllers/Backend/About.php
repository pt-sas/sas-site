<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_About;

class About extends BaseController
{
	public function index()
	{
		$this->new_title = 'About Us';
		$this->form_type = 'save_form';

		$about = new M_About();

		$data = [
			'about'		=> 	$about->first(),
			'title'		=>	'' . $this->new_title . '',
		];
		echo view('backend/about/v_about', $data);
	}

	public function show()
	{
			$about = new M_About();
			$list = $about->where('trx_compro_id', 10001)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'about_overview',
									'label'        =>   $value['tb_cp_overview']
							],
							[
									'field'        =>   'about_vision',
									'label'        =>   $value['tb_cp_vision']
							],
							[
									'field'        =>   'about_mision',
									'label'        =>   $value['tb_cp_mision']
							],
							[
									'field'        =>   'about_value',
									'label'        =>   $value['tb_cp_value']
							],
							[
									'field'        =>   'about_objectives',
									'label'        =>   $value['tb_cp_objectives']
							],
							[
									'field'        =>   'about_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$about = new M_About();
			$post = $this->request->getVar();

			$active = isset($post['about_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'trx_compro_id'   	=> $post['id'],
							'tb_cp_overview' 		=> $post['about_overview'],
							'tb_cp_vision' 			=> $post['about_vision'],
							'tb_cp_mision' 			=> $post['about_mision'],
							'tb_cp_value' 			=> $post['about_value'],
							'tb_cp_objectives'	=> $post['about_objectives']
					];

					if (!$validation->run($post, 'about')) {
							$response = $about->formError();
					} else {
							$result = $about->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
