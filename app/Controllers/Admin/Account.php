<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_account;

class Account extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Bank Account';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/account/v_account', $data);
    }

    public function showAll()
    {
        $account = new M_account();
        $list = $account->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_bankaccount_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['md_bank_id'];
            $row[] = $value['accountno'];
            $row[] = $value['branch'];
            $row[] = $value['description'];
            $row[] = status($value['isdefault']);
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
        $validation = \Config\Services::validation();
        $account = new M_account();
        $post = $this->request->getVar();

        $bank = isset($post['acc_bank']) ? $post['acc_bank'] : '';

        $active = isset($post['acc_isactive']) ? 'Y' : 'N';
        $default = isset($post['acc_isdefault']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['acc_name'],
                'md_bank_id'            => $bank,
                'accountno'             => $post['acc_accountno'],
                'branch'                => $post['acc_branch'],
                'description'           => $post['acc_desc'],
                'isdefault'             => $default,
            ];

            if (!$validation->run($post, 'account')) {
                $response = $account->formError();
            } else {
                $result = $account->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function show($id)
    {
        $account = new M_account();
        $list = $account->where('md_bankaccount_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'acc_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'acc_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'acc_bank',
                    'label'        =>   $value['md_bank_id']
                ],
                [
                    'field'        =>   'acc_accountno',
                    'label'        =>   $value['accountno']
                ],
                [
                    'field'        =>   'acc_branch',
                    'label'        =>   $value['branch']
                ],
                [
                    'field'        =>   'acc_desc',
                    'label'        =>   $value['description']
                ],
                [
                    'field'        =>   'acc_isdefault',
                    'label'        =>   $value['isdefault']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $account = new M_account();
        $post = $this->request->getVar();

        $bank = isset($post['acc_bank']) ? $post['acc_bank'] : '';

        $active = isset($post['acc_isactive']) ? 'Y' : 'N';
        $default = isset($post['acc_isdefault']) ? 'Y' : 'N';

        try {
            $data = [
                'md_bankaccount_id'     => $post['id'],
                'isactive'              => $active,
                'name'                  => $post['acc_name'],
                'md_bank_id'            => $bank,
                'accountno'             => $post['acc_accountno'],
                'branch'                => $post['acc_branch'],
                'description'           => $post['acc_desc'],
                'isdefault'             => $default,
            ];

            if (!$validation->run($post, 'account')) {
                $response = $account->formError();
            } else {
                $result = $account->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $account = new M_account();

        try {
            $result = $account->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
