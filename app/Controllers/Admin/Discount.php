<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_discount;

class Discount extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Discount';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/discount/v_discount', $data);
    }

    public function showAll()
    {
        $discount = new M_discount();
        $list = $discount->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_discountlist_id'];

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
        $discount = new M_discount();
        $post = $this->request->getVar();

        $active = isset($post['dis_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['dis_name'],
                'description'           => $post['dis_desc']
            ];

            if (!$validation->run($post, 'discount')) {
                $response = $discount->formError();
            } else {
                $result = $discount->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function show($id)
    {
        $discount = new M_discount();
        $list = $discount->where('md_discountlist_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'dis_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'dis_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'dis_desc',
                    'label'        =>   $value['description']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $discount = new M_discount();
        $post = $this->request->getVar();

        $active = isset($post['dis_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'md_discountlist_id'    => $post['id'],
                'isactive'              => $active,
                'name'                  => $post['dis_name'],
                'description'           => $post['dis_desc']
            ];

            if (!$validation->run($post, 'discount')) {
                $response = $discount->formError();
            } else {
                $result = $discount->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $discount = new M_discount();

        try {
            $result = $discount->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
