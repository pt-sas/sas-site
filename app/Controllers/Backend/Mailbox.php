<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Mailbox;

class Mailbox extends BaseController
{
	public function index()
	{
		$mailbox = new M_Mailbox();

		$this->new_title = 'Mailbox';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=>'' . $this->new_title . '',
			'button'    =>'<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
			'mailbox' 		=> $mailbox->findAll()
		];
		echo view('backend/mailbox/v_mailbox', $data);
	}

	public function showAll()
	{
			$mailbox = new M_Mailbox();
			$list = $mailbox->showAll();
			$data = [];

			$number = 0;
			foreach ($list as $value) :
					$row = [];
					$ID = $value['trx_contact_id'];

					$number++;

					$row[] = $ID;
					$row[] = $number;
					$row[] = $value['name'];
					$row[] = $value['email'];
					$row[] = $value['subject'];
					$row[] = active($value['isactive']);
					$row[] = '<center>
											<a class="btn" onclick="Destroy(' . "'" . $ID . "'" . ')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
										</center>';
					$data[] = $row;
			endforeach;

			$result = array('data' => $data);
			return json_encode($result);
	}

	public function create()
	{
			// $email = \Config\Services::email();
			// $post = $this->request->getVar();
			// $to 	= 'anharpanduwinata@gmail.com';
			//
			// $email->setTo($to);
			// $email->setFrom($post['mailbox_email'], $post['mailbox_name']);
			// $email->setSubject($post['mailbox_subject']);
			// $email->setMessage($post['mailbox_message']);
			//
			// if ($email->send()) {
			// 	echo 'Email successfully sent';
			// } else {
			// 	$data = $email->printDebugger(['headers']);
			// 	print_r($data);
			// }
			$email = \Config\Services::email();
			$subject = 'Subject';
			$message = 'Message';

			$email->setTo('anharpanduwinata@gmail.com');
			$email->setFrom('anhar@sahabatabadi.com', 'Anhar Panduwinata');

			$email->setSubject($subject);
			$email->setMessage($message);

			if ($email->send()) {
				echo 'Email successfully sent';
			} else {
				$data = $email->printDebugger(['headers']);
				print_r($data);
			}
	}

	public function show($id)
	{
			$mailbox = new M_Mailbox();
			$list = $mailbox->where('trx_contact_id', $id)->findAll();

			foreach ($list as $value) :
					$response =  [
							[
									'field'        =>   'mailbox_name',
									'label'        =>   $value['name']
							],
							[
									'field'        =>   'mailbox_email',
									'label'        =>   $value['email']
							],
							[
									'field'        =>   'mailbox_subject',
									'label'        =>   $value['subject']
							],
							[
									'field'        =>   'mailbox_inquiry',
									'label'        =>   $value['inquiry']
							],
							[
									'field'        =>   'mailbox_phone',
									'label'        =>   $value['phone']
							],
							[
									'field'        =>   'mailbox_message',
									'label'        =>   $value['message']
							],
							[
									'field'        =>   'mailbox_isactive',
									'label'        =>   $value['isactive']
							]
					];
			endforeach;

			return json_encode($response);
	}

	public function edit()
	{
			$validation = \Config\Services::validation();
			$mailbox = new M_Mailbox();
			$post = $this->request->getVar();

			$active = isset($post['mailbox_isactive']) ? 'Y' : 'N';

			try {
					$data = [
							'trx_contact_id'  => $post['id'],
							'name' 						=> $post['mailbox_name'],
							'email' 					=> $post['mailbox_email'],
							'subject' 				=> $post['mailbox_subject'],
							'inquiry' 				=> $post['mailbox_inquiry'],
							'phone' 					=> $post['mailbox_phone'],
							'message'					=> $post['mailbox_message'],
							'isactive'     		=> $active
					];

					if (!$validation->run($post, 'mailbox')) {
							$response = $mailbox->formError();
					} else {
							$result = $mailbox->save($data);
							$response = message('success', true, $result);
					}
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}

	public function destroy($id)
	{
			$mailbox = new M_Mailbox();

			try {
					$result = $mailbox->delete($id);
					$response = message('success', true, $result);
			} catch (\Exception $e) {
					$response = message('error', false, $e->getMessage());
			}
			return json_encode($response);
	}
}
