<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class About extends BaseController
{
	public function index()
	{
		return view('frontend/company/about');
	}

	//--------------------------------------------------------------------

}
