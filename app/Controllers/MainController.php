<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
	public function __construct() {
	}

	public function index()
	{
		$data['page_title'] = 'Home - Sahabat Abadi Sejahtera';
		return view('frontend/index', $data);
	}

	public function product()
	{
		$data['page_title'] = 'Product - Sahabat Abadi Sejahtera';
		return view('frontend/product/index', $data);
	}
	public function productdetail($id)
	{
		$data['page_title'] = 'View Product - Sahabat Abadi Sejahtera';
		return view('frontend/product/detail', $data);
	}
	public function productcompare()
	{
		$data['page_title'] = 'Compare Product - Sahabat Abadi Sejahtera';
		return view('frontend/product/compare', $data);
	}

	public function about()
	{
		$data['page_title'] = 'About Us - Sahabat Abadi Sejahtera';
		return view('frontend/about', $data);
	}

	public function news()
	{
		$data['page_title'] = 'News & Promo - Sahabat Abadi Sejahtera';
		return view('frontend/news/index', $data);
	}
	public function newsdetail($id)
	{
		$data['page_title'] = 'View News - Sahabat Abadi Sejahtera';
		return view('frontend/news/detail', $data);
	}

	public function career()
	{
		$data['page_title'] = 'Career - Sahabat Abadi Sejahtera';
		return view('frontend/career/index', $data);
	}

	public function contact()
	{
		$data['page_title'] = 'Contact Us - Sahabat Abadi Sejahtera';
		return view('frontend/contact', $data);
	}

	//--------------------------------------------------------------------

}
