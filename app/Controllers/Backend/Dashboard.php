<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$this->new_title = 'Dashboard';

		$data = [
			'title'    	=> '' . $this->new_title . '',
		];

		return $this->template->render('backend/dashboard', $data);
	}
}
