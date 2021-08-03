<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_About;
use App\Models\M_Location;

use App\Models\M_Principal;
use App\Models\M_Productgroup;
use App\Models\M_Product;

use App\Models\M_News;
use App\Models\M_Promo;

use App\Models\M_Division;
use App\Models\M_Job;

use App\Models\M_Mailbox;

class MainController extends BaseController
{
	public function __construct()
	{
	}

	public function index()
	{
		$news		= new M_News();

		$data = [
			'news' 				=> $news->where('isactive', 'Y')->show3(),
			'page_title'	=> 'Home - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/index', $data);
	}

	public function product()
	{
		$principal = new M_Principal();

		$data = [
			'principal' 	=> $principal->showAll(),
			'page_title'	=> 'Product - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/product/index', $data);
	}
	public function productdetail($url)
	{
		$principal 		= new M_Principal();
		$productgroup = new M_Productgroup();
		$product 			= new M_Product();

		$data = [
			'principal' 		=> $principal->where('url', $url)->first(),
			'category1'			=> $productgroup->getDetail($url, 1),
			'product' 			=> $product->getDetail($url),
			'page_title'		=> 'View Product - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/product/detail', $data);
	}
	public function productcompare()
	{
		$data['page_title'] = 'Compare Product - PT Sahabat Abadi Sejahtera';
		return view('frontend/product/compare', $data);
	}

	public function about()
	{
		$about 		= new M_About();
		$location = new M_Location();

		$data = [
			'about' 			=> $about->first(),
			'location' 		=> $location->findAll(),
			'page_title'	=> 'About Us - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/about', $data);
	}

	public function news()
	{
		$news		= new M_News();
		$promo	= new M_Promo();

		$data = [
			'news' 				=> $news->showAll(),
			'promo' 			=> $promo->showAll(),
			'page_title'	=> 'News & Promo - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/news/index', $data);
	}
	public function newsdetail($slug)
	{
		$news		= new M_News();

		$data = [
			'news' 				=> $news->getDetail($slug),
			'page_title'	=> 'News & Promo - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/news/newsdetail', $data);
	}
	public function promodetail($slug)
	{
		$promo		= new M_Promo();

		$data = [
			'promo' 			=> $promo->getDetail($slug),
			'page_title'	=> 'News & Promo - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/news/promodetail', $data);
	}

	public function career()
	{
		$division	= new M_Division();
		$job 			= new M_Job();

		$data = [
			'division' 		=> $division->where('isactive', 'Y')->findAll(),
			'job' 				=> $job->where('isactive', 'Y')->showAll(),
			'page_title'	=> 'About Us - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/career', $data);
	}

	public function contact()
	{
		$data['page_title'] = 'Contact Us - PT Sahabat Abadi Sejahtera';
		return view('frontend/contact', $data);
	}

	//--------------------------------------------------------------------


	public function create()
	{
		$email = \Config\Services::email();
		$validation = \Config\Services::validation();
		$eMailbox = new \App\Entities\Mailbox();
		$mailbox = new M_Mailbox();

		$post = $this->request->getVar();

		try {
			$eMailbox->fill($post);

			if (!$validation->run($post, 'mailbox')) {
				$response =	$this->field->errorValidation('trx_contact');
			} else {
				$insert = $mailbox->save($eMailbox);

				if ($insert) {
					$email->setTo('info@sahabatabadi.com');
					$email->setFrom($post['email'], $post['name']);
					$email->setSubject($post['subject']);
					$email->setMessage($post['message']);

					if ($email->send()) {
						$result = 'Email successfully sent';
					} else {
						$result = $email->printDebugger(['headers']);
					}
				}
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	function filterCategory()
	{
		$product = new M_Product();
		$post = $this->request->getVar();

		try {
			$result = $product->showProductBy($post['principal'], $post['category1'], $post['category2'], $post['category3'], $post['keyword']);
			$response = message('success', true, $result->getResult());
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function getCategory()
	{
		$productgroup = new M_Productgroup();
		$post = $this->request->getVar();

		$category1 = '';
		$category2 = '';

		if (isset($post['category1'])) {
			$category1 = $post['category1'];
		}

		if (isset($post['category2'])) {
			$category2 = $post['category2'];
		}

		try {
			$result = $productgroup->showCategoryBy($post['principal'], $category1, $category2);
			$response = message('success', true, $result->getResult());
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}
}
