<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_menu;

class Menu extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Menu';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/menu/v_menu', $data);
    }

    public function showAll()
    {
        $menu = new M_menu();
        $list = $menu->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['sys_menu_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = statusMenu($value['status']);
            $row[] = $value['icon'];
            $row[] = $value['url'];
            $row[] = $value['sequence'];
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
        $menu = new M_menu();
        $post = $this->request->getVar();

        $active = isset($post['mnu_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['mnu_name'],
                'status'                => $post['mnu_status'],
                'url'                   => $post['mnu_url'],
                'sequence'              => $post['mnu_sequence'],
                'icon'                  => $post['mnu_icon']
            ];

            if (!$validation->run($post, 'menu')) {
                $response = $menu->formError();
            } else {
                $result = $menu->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function show($id)
    {
        $menu = new M_menu();
        $list = $menu->where('sys_menu_id', $id)->findAll();

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
                ],
                [
                    'field'        =>   'mnu_url',
                    'label'        =>   $value['url']
                ],
                [
                    'field'        =>   'mnu_sequence',
                    'label'        =>   $value['sequence']
                ],
                [
                    'field'        =>   'mnu_icon',
                    'label'        =>   $value['icon']
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

        try {
            $data = [
                'sys_menu_id'           => $post['id'],
                'isactive'              => $active,
                'name'                  => $post['mnu_name'],
                'status'                => $post['mnu_status'],
                'url'                   => $post['mnu_url'],
                'sequence'              => $post['mnu_sequence'],
                'icon'                  => $post['mnu_icon']
            ];

            if (!$validation->run($post, 'menu')) {
                $response = $menu->formError();
            } else {
                $result = $menu->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $menu = new M_menu();

        try {
            $result = $menu->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
