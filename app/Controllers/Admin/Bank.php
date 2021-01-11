<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_bank;

class Bank extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Bank';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/bank/v_bank', $data);
    }

    public function showAll()
    {
        $bank = new M_bank();
        $list = $bank->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_bank_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['description'];
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
        $bank = new M_bank();
        $post = $this->request->getVar();

        $active = isset($post['bnk_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['bnk_name'],
                'description'           => $post['bnk_desc']
            ];

            if (!$validation->run($post, 'bank')) {
                $response = $bank->formError();
            } else {
                $result = $bank->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function show($id)
    {
        $bank = new M_bank();
        $list = $bank->where('md_bank_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'bnk_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'bnk_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'bnk_desc',
                    'label'        =>   $value['description']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $bank = new M_bank();
        $post = $this->request->getVar();

        $active = isset($post['bnk_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'md_bank_id'            => $post['id'],
                'isactive'              => $active,
                'name'                  => $post['bnk_name'],
                'description'           => $post['bnk_desc']
            ];

            if (!$validation->run($post, 'bank')) {
                $response = $bank->formError();
            } else {
                $result = $bank->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $bank = new M_bank();

        try {
            $result = $bank->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
