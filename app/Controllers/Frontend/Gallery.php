<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Gallery extends BaseController
{
	public function index()
	{
		return view('frontend/media/gallery');
	}

	//--------------------------------------------------------------------

}
