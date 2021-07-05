<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Store extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'Store - Sahabat Abadi Sejahtera';
		return view('frontend/store/index',$data);
	}

	//--------------------------------------------------------------------

}
