<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_About;
use App\Models\M_Location;
use App\Models\M_Mailbox;

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
		$about 		= new M_About();
		$location = new M_Location();

		$data = [
			'about' 			=> $about->first(),
			'location' 		=> $location->findAll(),
			'page_title'	=> 'About Us - Sahabat Abadi Sejahtera'
		];
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
