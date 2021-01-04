<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Product extends BaseController
{
	public function index()
	{
		return view('frontend/product/index');
	}

	//--------------------------------------------------------------------

}
