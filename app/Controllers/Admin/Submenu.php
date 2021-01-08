<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_submenu;

class Submenu extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Submenu';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/submenu/v_submenu', $data);
    }

    public function showAll()
    {
        $submenu = new M_submenu();
        $list = $submenu->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['sys_submenu_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['status'];
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
        $submenu = new M_submenu();
        $post = $this->request->getVar();

        $active = isset($post['sub_isactive']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            'name'                  => $post['sub_name'],
            'status'                => $post['sub_status']
        ];

        if (!$validation->run($post, 'submenu')) {
            $response = $submenu->formError();
        } else {
            $result = $submenu->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $submenu = new M_submenu();
        $list = $submenu->where('sys_submenu_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'sub_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'sub_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'sub_status',
                    'label'        =>   $value['status']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $submenu = new M_submenu();
        $post = $this->request->getVar();

        $active = isset($post['sub_isactive']) ? 'Y' : 'N';

        $data = [
            'sys_submenu_id'        => $post['id'],
            'isactive'              => $active,
            'name'                  => $post['sub_name'],
            'status'                => $post['sub_status']
        ];

        if (!$validation->run($post, 'submenu')) {
            $response = $submenu->formError();
        } else {
            $result = $submenu->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $submenu = new M_submenu();
        $result = $submenu->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
