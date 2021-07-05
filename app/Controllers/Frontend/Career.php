<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Frontend\Career_model;

class Career extends BaseController
{
	public function __construct() {
        $this->model = new Career_model();
	}
	
	public function index()
	{
		$data['page_title'] = 'Career - Sahabat Abadi Sejahtera';
		
		$data['career'] = $this->model->getCareer();
		return view('frontend/career/index', $data);
	}

	public function view()
	{
		$data['page_title'] = 'Career - Sahabat Abadi Sejahtera';

		$career = $this->request->uri->getSegment(3);
		$data['career'] = $this->model->viewCareer($career);
		return view('frontend/career/detail',$data);
	}


	// //--------------------------------------------------------------------

}

