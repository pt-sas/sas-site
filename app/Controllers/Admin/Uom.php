<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_uom;

class Uom extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Uom';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/uom/v_uom', $data);
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
        $uom = new M_uom();
        $post = $this->request->getVar();

        $active = isset($post['uom_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['uom_name'],
                'description'           => $post['uom_desc']
            ];

            if (!$validation->run($post, 'uom')) {
                $response = $uom->formError();
            } else {
                $result = $uom->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
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

        try {
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
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $uom = new M_uom();

        try {
            $result = $uom->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
