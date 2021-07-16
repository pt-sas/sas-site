<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_About;
use App\Models\M_Location;

use App\Models\M_Principal;

use App\Models\M_News;
use App\Models\M_Promo;

use App\Models\M_Division;
use App\Models\M_Job;

use App\Models\M_Mailbox;

class MainController extends BaseController
{
	public function __construct() {
	}

	public function index()
	{
		$news		= new M_News();

		$data = [
			'news' 				=> $news->where('isactive','Y')->show3(),
			'page_title'	=> 'Home - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/index', $data);
	}

	public function product()
	{
		$principal = new M_Principal();

		$data = [
			'principal' 	=> $principal->where('isactive','Y')->showAll(),
			'page_title'	=> 'Product - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/product/index', $data);
	}
	public function productdetail($id)
	{
		$data['page_title'] = 'View Product - PT Sahabat Abadi Sejahtera';
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
			'news' 				=> $news->where('isactive','Y')->showAll(),
			'promo' 			=> $promo->where('isactive','Y')->showAll(),
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
			'division' 		=> $division->where('isactive','Y')->findAll(),
			'job' 				=> $job->where('isactive','Y')->showAll(),
			'page_title'	=> 'About Us - PT Sahabat Abadi Sejahtera'
		];
		return view('frontend/career/index', $data);
	}

	public function contact()
	{
		$data['page_title'] = 'Contact Us - PT Sahabat Abadi Sejahtera';
		return view('frontend/contact', $data);
	}

	//--------------------------------------------------------------------


	public function create() {
		$validation = \Config\Services::validation();
		$mailbox = new M_Mailbox();
		$post = $this->request->getVar();

		try {
				$data = [
						'name' 		=> $post['mailbox_name'],
						'email' 	=> $post['mailbox_email'],
						'subject' => $post['mailbox_subject'],
						'inquiry' => $post['mailbox_inquiry'],
						'phone' 	=> $post['mailbox_phone'],
						'message' => $post['mailbox_message']
				];

				if (!$validation->run($post, 'mailbox')) {
						$response = $mailbox->formError();
				} else {
						$result = $mailbox->save($data);
						$response = message('success', true, $result);

						$email = \Config\Services::email();
						$email->setTo('info@sahabatabadi.com');
						$email->setFrom($post['mailbox_email'], $post['mailbox_name']);
						$email->setSubject($post['mailbox_subject']);
						$email->setMessage($post['mailbox_message']);

						if ($email->send()) {
							echo 'Email successfully sent';
						} else {
							$data = $email->printDebugger(['headers']);
							print_r($data);
						}
				}
		} catch (\Exception $e) {
				$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
