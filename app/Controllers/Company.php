<?php

namespace App\Controllers;
use App\Models\M_Company;

class Company extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Company';
		$this->form_type = 'save_form';

		$company = new M_Company();

		$data = [
			'company'	=> 	$company->findCompany(1),
			'title'		=>	'' . $this->new_title . '',
		];
		echo view('backend/masterdata/company/v_company', $data);
	}

	public function show()
	{
			$company = new M_Company();
			$list = $company->where('md_company_id', 1)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'company_name',
									'label'        =>   $value['md_company_name']
							],
							[
									'field'        =>   'company_address',
									'label'        =>   $value['md_company_address']
							],
							[
									'field'        =>   'company_phone',
									'label'        =>   $value['md_company_phone']
							],
							[
									'field'        =>   'company_hrd',
									'label'        =>   $value['md_company_hrd']
							],
							[
									'field'        =>   'company_hrdmail',
									'label'        =>   $value['md_company_hrdmail']
							],
							[
									'field'        =>   'company_bpjslimit',
									'label'        =>   $value['md_company_bpjslimit']
							],
							[
									'field'        =>   'company_pensionlimit',
									'label'        =>   $value['md_company_pensionlimit']
							],
							[
									'field'        =>   'company_cutoff',
									'label'        =>   $value['md_company_cutoff']
							],
							[
									'field'        =>   'company_pensionage',
									'label'        =>   $value['md_company_pensionage']
							],
							[
									'field'        =>   'company_positioncostlimit',
									'label'        =>   $value['md_company_positioncostlimit']
							],
							[
									'field'        =>   'company_class1limit',
									'label'        =>   $value['md_company_class1limit']
							],
							[
									'field'        =>   'company_class2limit',
									'label'        =>   $value['md_company_class2limit']
							],
							[
									'field'        =>   'company_overtime',
									'label'        =>   $value['md_company_overtime']
							],
							[
									'field'        =>   'company_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$company = new M_Company();
			$post = $this->request->getVar();

			$active = isset($post['company_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'md_company_id'   							=> $post['id'],
							'md_company_name' 							=> $post['company_name'],
							'md_company_address' 						=> $post['company_address'],
							'md_company_phone' 							=> $post['company_phone'],
							'md_company_hrd' 								=> $post['company_hrd'],
							'md_company_hrdmail' 						=> $post['company_hrdmail'],
							'md_company_bpjslimit' 					=> $post['company_bpjslimit'],
							'md_company_pensionlimit' 			=> $post['company_pensionlimit'],
							'md_company_cutoff' 						=> $post['company_cutoff'],
							'md_company_pensionage' 				=> $post['company_pensionage'],
							'md_company_positioncostlimit' 	=> $post['company_positioncostlimit'],
							'md_company_class1limit' 				=> $post['company_class1limit'],
							'md_company_class2limit' 				=> $post['company_class2limit'],
							'md_company_overtime' 					=> $post['company_overtime']
					];

					if (!$validation->run($post, 'company')) {
							$response = $company->formError();
					} else {
							$result = $company->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
