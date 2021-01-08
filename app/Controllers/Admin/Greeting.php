<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_greeting;

class Greeting extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Greeting';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/greeting/v_greeting', $data);
    }

    public function showAll()
    {
        $greeting = new M_greeting();
        $list = $greeting->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_greeting_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['description'];
            $row[] = $value['isactive'];
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
        $greeting = new M_greeting();
        $post = $this->request->getVar();

        $active = isset($post['gre_isactive']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            'name'                  => $post['gre_name'],
            'description'           => $post['gre_desc']
        ];

        if (!$validation->run($post, 'greeting')) {
            $response = $greeting->formError();
        } else {
            $result = $greeting->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $greeting = new M_greeting();
        $list = $greeting->where('md_greeting_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'gre_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'gre_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'gre_desc',
                    'label'        =>   $value['description']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $greeting = new M_greeting();
        $post = $this->request->getVar();

        $active = isset($post['gre_isactive']) ? 'Y' : 'N';

        $data = [
            'md_greeting_id'                => $post['id'],
            'isactive'              => $active,
            'name'                  => $post['gre_name'],
            'description'           => $post['gre_desc']
        ];

        if (!$validation->run($post, 'greeting')) {
            $response = $greeting->formError();
        } else {
            $result = $greeting->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $greeting = new M_greeting();
        $result = $greeting->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
