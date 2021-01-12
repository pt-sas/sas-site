<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_product_group;
use App\Models\Admin\M_principal;

class Group extends BaseController
{
    public function index()
    {
        $principal = new M_principal();

        $this->new_title = 'New Product Group';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>',
            'principal' => $principal->where('isactive', 'Y')->findAll()
        ];
        return view('admin/product_group/v_product_group', $data);
    }

    public function showAll()
    {
        $group = new M_product_group();
        $list = $group->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_productgroup_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['md_principal_id'];
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
        $group = new M_product_group();
        $post = $this->request->getVar();

        $principal = isset($post['gro_principal']) ? $post['gro_principal'] : '';

        $active = isset($post['gro_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['gro_name'],
                'description'           => $post['gro_desc'],
                'md_principal_id'       => $principal
            ];

            if (!$validation->run($post, 'group')) {
                $response = $group->formError();
            } else {
                $result = $group->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function show($id)
    {
        $group = new M_product_group();
        $list = $group->where('md_productgroup_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'gro_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'gro_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'gro_desc',
                    'label'        =>   $value['description']
                ],
                [
                    'field'        =>   'gro_principal',
                    'label'        =>   $value['md_principal_id']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $group = new M_product_group();
        $post = $this->request->getVar();

        $principal = isset($post['gro_principal']) ? $post['gro_principal'] : '';

        $active = isset($post['gro_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'md_productgroup_id'    => $post['id'],
                'isactive'              => $active,
                'name'                  => $post['gro_name'],
                'description'           => $post['gro_desc'],
                'md_principal_id'       => $principal
            ];

            if (!$validation->run($post, 'group')) {
                $response = $group->formError();
            } else {
                $result = $group->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $group = new M_product_group();

        try {
            $result = $group->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
