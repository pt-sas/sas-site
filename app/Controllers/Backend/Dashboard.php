<?php
namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$this->new_title = 'Dashboard';

		$data = [
			'title'    	=>'' . $this->new_title . '',
		];

		echo view('backend/dashboard', $data);
	}
}
