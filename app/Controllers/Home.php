<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'HR Management System - SAS';
		$this->new_title = 'Dashboard';

		$data = [
			'title'    	=>'' . $this->new_title . '',
		];

		echo view('backend/dashboard', $data);
	}
}
