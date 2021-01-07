<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_principal;

class Principal extends BaseController
{
    public function index()
    {
        return view('admin/principal/v_principal');
    }

    public function showAll()
    {
        $principal = new M_principal();
        $list = $principal->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_principal_id'];

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
        $principal = new M_principal();
        $post = $this->request->getVar();

        $active = isset($post['pri_isactive']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            'name'                  => $post['pri_name'],
            'description'           => $post['pri_desc']
        ];

        if (!$validation->run($post, 'principal')) {
            $response = $principal->formError();
        } else {
            $result = $principal->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $principal = new M_principal();
        $list = $principal->where('md_principal_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'pri_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'pri_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'pri_desc',
                    'label'        =>   $value['description']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $principal = new M_principal();
        $post = $this->request->getVar();

        $active = isset($post['pri_isactive']) ? 'Y' : 'N';

        $data = [
            'md_principal_id'       => $post['id'],
            'isactive'              => $active,
            'name'                  => $post['pri_name'],
            'description'           => $post['pri_desc']
        ];

        if (!$validation->run($post, 'principal')) {
            $response = $principal->formError();
        } else {
            $result = $principal->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $principal = new M_principal();
        $result = $principal->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
