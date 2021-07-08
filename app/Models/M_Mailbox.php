<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Mailbox extends Model
{
    protected $table      = 'trx_contact';
    protected $primaryKey = 'trx_contact_id';
    protected $allowedFields = [
        'name',
        'email',
        'subject',
        'inquiry',
        'phone',
        'message',
        'isactive'
    ];
    protected $useTimestamps = true;

    public function compose()
    {
        $name     = $this->input->post('subject');
        $email    = $this->input->post('email');
        $subject  = $this->input->post('subject');
        $inquiry  = $this->input->post('inquiry');
        $phone    = $this->input->post('phone');
        $message  = $this->input->post('message');

        $config = [
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_user' => 'witamapku@gmail.com',
          'smtp_pass' => 'Panduwinata11',
          'smtp_port' => 465,
          'crlf'      => "\r\n",
          'newline'   => "\r\n",
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);
        $this->email->from('witamapku@gmail.com');
        $this->email->bcc($receiver);
        $this->email->subject('News Baru di Portal Akademik');
        $this->email->message('<p>Anda memiliki pesan baru di Portal Akademik dengan judul <b>'.$subject.'</b>.<br>{unwrap}Silahkan login ke <a href="localhost/ionschool/user">Portal Akademik</a> untuk melihat isi pesan tersebut.{/unwrap}</p>');
        $this->email->set_mailtype('html');
        $this->email->send();

        $data = array(
          'name'        => $name,
          'email'       => $email,
          'subject'     => $subject,
          'inquiry'     => $inquiry,
          'phone'       => $phone,
          'message'     => $message,
          'created_by'  => '1'
        );
        $this->db->insert('trx_contact', $data);
    		$id = $this->db->insert_id();
    		return (isset($id)) ? $id : FALSE;
    }

    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'mailbox'
            ],
            [
                'error'        =>   'error_mailbox_name',
                'field'        =>   'mailbox_name',
                'label'        =>   $validation->getError('mailbox_name')
            ],
            [
                'error'        =>   'error_mailbox_email',
                'field'        =>   'mailbox_email',
                'label'        =>   $validation->getError('mailbox_email')
            ],
            [
                'error'        =>   'error_mailbox_subject',
                'field'        =>   'mailbox_subject',
                'label'        =>   $validation->getError('mailbox_subject')
            ],
            [
                'error'        =>   'error_mailbox_inquiry',
                'field'        =>   'mailbox_inquiry',
                'label'        =>   $validation->getError('mailbox_inquiry')
            ],
            [
                'error'        =>   'error_mailbox_phone',
                'field'        =>   'mailbox_phone',
                'label'        =>   $validation->getError('mailbox_phone')
            ],
            [
                'error'        =>   'error_mailbox_message',
                'field'        =>   'mailbox_message',
                'label'        =>   $validation->getError('mailbox_message')
            ],
            [
                'error'        =>   'error_mailbox_isactive',
                'field'        =>   'mailbox_isactive',
                'label'        =>   $validation->getError('mailbox_isactive')
            ]
        ];
    }
}
