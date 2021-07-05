<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Gallery extends BaseController
{
	public function index()
	{
		$data['page_title'] = 'Gallery - Sahabat Abadi Sejahtera';
		
		return view('frontend/media/gallery/index',$data);
	}

	public function view()
	{
		$data['page_title'] = 'Gallery - Sahabat Abadi Sejahtera';

		$album = $this->request->uri->getSegment(3);
		$data['gallery'] = $this->model->viewGallery($album);
		return view('frontend/media/gallery/detail',$data);
	}

	//--------------------------------------------------------------------

}
