<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_division;

class Division extends BaseController
{
    public function index()
    {
        return view('admin/division/v_division');
    }

    public function showAll()
    {
        $division = new M_division();
        $list = $division->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_division_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['description'];
            $row[] = $value['pic'];
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
        $division = new M_division();
        $post = $this->request->getVar();

        $active = isset($post['div_isactive']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            'name'                  => $post['div_name'],
            'description'           => $post['div_desc'],
            'pic'                   => $post['div_pic']
        ];

        if (!$validation->run($post, 'division')) {
            $response = $division->formError();
        } else {
            $result = $division->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $division = new M_division();
        $list = $division->where('md_division_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'div_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'div_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'div_desc',
                    'label'        =>   $value['description']
                ],
                [
                    'field'        =>   'div_pic',
                    'label'        =>   $value['pic']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $division = new M_division();
        $post = $this->request->getVar();

        $active = isset($post['div_isactive']) ? 'Y' : 'N';

        $data = [
            'md_division_id'        => $post['id'],
            'isactive'              => $active,
            'name'                  => $post['div_name'],
            'description'           => $post['div_desc'],
            'pic'                   => $post['div_pic']
        ];

        if (!$validation->run($post, 'division')) {
            $response = $division->formError();
        } else {
            $result = $division->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $division = new M_division();
        $result = $division->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
