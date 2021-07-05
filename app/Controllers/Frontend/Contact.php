<?php 
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Contact extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'Contact Us - Sahabat Abadi Sejahtera';
		return view('frontend/contact/index',$data);
	}

	//--------------------------------------------------------------------

}
