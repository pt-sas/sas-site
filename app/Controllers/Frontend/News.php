<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class News extends BaseController
{
	public function index()
	{
		return view('frontend/media/news');
	}

	//--------------------------------------------------------------------

}
