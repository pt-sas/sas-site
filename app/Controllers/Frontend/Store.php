<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Store extends BaseController
{
	public function index()
	{
		return view('frontend/store/index');
	}

	//--------------------------------------------------------------------

}
