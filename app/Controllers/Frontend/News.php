<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Frontend\News_Model;

class News extends BaseController
{
	public function __construct() {
        $this->model = new News_Model();
	}
	
	public function index()
	{
		$data['page_title'] = 'News - Sahabat Abadi Sejahtera';
		
		$data['news'] = $this->model->getNews();
		return view('frontend/media/news/index',$data);
	}

	public function view()
	{
		$data['page_title'] = 'News - Sahabat Abadi Sejahtera';

		$slug = $this->request->uri->getSegment(2);
		$data['news'] = $this->model->viewNews($slug);
		return view('frontend/media/news/detail',$data);
	}

	//--------------------------------------------------------------------

}
