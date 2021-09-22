<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Visit;

class Visitor extends BaseController
{
	protected $table = 'sys_visit';

	public function index()
	{
		return $this->template->render('backend/visitor/v_visitor');
	}

	public function showAll()
	{
		$visit = new M_Visit();
		$list = $visit->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];

			$number++;

			$row[] = $number;
			$row[] = $value->ipaddress;
			$row[] = $value->browser;
			$row[] = $value->platform;
			$row[] = $value->time;
			$data[] = $row;
		endforeach;

		$result = array('data' => $data);
		return json_encode($result);
	}
}
