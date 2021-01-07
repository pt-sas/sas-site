<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_menu;

class Menu extends BaseController
{
    public function index()
    {
        return view('admin/menu/v_menu');
    }

    public function showAll()
    {
        $menu = new M_menu();
        $list = $menu->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['menu_id'];

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
        $menu = new M_menu();
        $post = $this->request->getVar();

        $active = isset($post['mnu_isactive']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            'name'                  => $post['mnu_name'],
            'status'                => $post['mnu_status']
        ];

        if (!$validation->run($post, 'menu')) {
            $response = $menu->formError();
        } else {
            $result = $menu->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $menu = new M_menu();
        $list = $menu->where('menu_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'mnu_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'mnu_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'mnu_status',
                    'label'        =>   $value['status']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $menu = new M_menu();
        $post = $this->request->getVar();

        $active = isset($post['mnu_isactive']) ? 'Y' : 'N';

        $data = [
            'menu_id'               => $post['id'],
            'isactive'              => $active,
            'name'                  => $post['mnu_name'],
            'status'                => $post['mnu_status']
        ];

        if (!$validation->run($post, 'menu')) {
            $response = $menu->formError();
        } else {
            $result = $menu->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $menu = new M_menu();
        $result = $menu->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
