<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_uom;

class Uom extends BaseController
{
    public function index()
    {
        return view('admin/uom/v_uom');
    }

    public function showAll()
    {
        $uom = new M_uom();
        $list = $uom->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_uom_id'];

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
        $uom = new M_uom();
        $post = $this->request->getVar();

        $active = isset($post['uom_isactive']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            'name'                  => $post['uom_name'],
            'description'           => $post['uom_desc']
        ];

        if (!$validation->run($post, 'uom')) {
            $response = $uom->formError();
        } else {
            $result = $uom->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $uom = new M_uom();
        $list = $uom->where('md_uom_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'uom_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'uom_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'uom_desc',
                    'label'        =>   $value['description']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $uom = new M_uom();
        $post = $this->request->getVar();

        $active = isset($post['uom_isactive']) ? 'Y' : 'N';

        $data = [
            'md_uom_id'             => $post['id'],
            'isactive'              => $active,
            'name'                  => $post['uom_name'],
            'description'           => $post['uom_desc']
        ];

        if (!$validation->run($post, 'uom')) {
            $response = $uom->formError();
        } else {
            $result = $uom->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $uom = new M_uom();
        $result = $uom->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
