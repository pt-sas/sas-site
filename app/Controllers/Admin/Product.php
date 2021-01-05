<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_product;
use App\Models\Admin\M_product_group;

class Product extends BaseController
{
    public function index()
    {
        // $group = new M_product_group();
        // $data = [
        //     'pro_group' => $group->findAll()
        // ];
        return view('admin/product/v_product');
    }

    public function showAll()
    {
        $product = new M_product();
        $list = $product->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_product_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['code'];
            $row[] = $value['name'];
            $row[] = $value['code'];
            $row[] = $value['qty'];
            $row[] = $value['qty'];
            $row[] = $value['width'];
            $row[] = $value['height'];
            $row[] = $value['depth'];
            $row[] = $value['volume'];
            $row[] = $value['code'];
            $row[] = $value['code'];
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
        $product = new M_product();
        $post = $this->request->getVar();

        $active = isset($post['pro_isactive']) ? 'Y' : 'N';
        $visible = isset($post['pro_visible']) ? 'Y' : 'N';

        $data = [
            'isactive'              => $active,
            // 'm_product_id'          => $post['pro_ref_product'],
            // 'md_principal_id'       => $post['pro_principal'],
            // 'md_pricelist_id'       => $post['pro_pricelist'],
            'md_productgroup_id'    => $post['pro_group'],
            // 'md_uom_id'             => $post['pro_uom'],
            'code'                  => $post['pro_code'],
            'name'                  => $post['pro_name'],
            'description'           => $post['pro_desc'],
            'weight'                => $post['pro_weight'],
            'width'                 => $post['pro_width'],
            'height'                => $post['pro_height'],
            'depth'                 => $post['pro_depth'],
            'volume'                => $post['pro_volume'],
            'qty'                   => $post['pro_qty'],
            'visible'               => $visible
        ];

        if (!$validation->run($post, 'product')) {
            $response = $product->formError();
        } else {
            $result = $product->save($data);
            $response = [['success' => 'success', 'insert' => $result]];
        }

        return json_encode($response);
    }

    public function show($id)
    {
        $product = new M_product();
        $list = $product->where('md_product_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'pro_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'pro_code',
                    'label'        =>   $value['code']
                ],
                [
                    'field'        =>   'pro_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'pro_desc',
                    'label'        =>   $value['description']
                ],
                [
                    'field'        =>   'pro_qty',
                    'label'        =>   $value['qty']
                ],
                [
                    'field'        =>   'pro_uom',
                    'label'        =>   $value['md_uom_id']
                ],
                [
                    'field'        =>   'pro_group',
                    'label'        =>   $value['md_productgroup_id']
                ],
                [
                    'field'        =>   'pro_principal',
                    'label'        =>   $value['md_principal_id']
                ],
                [
                    'field'        =>   'pro_weight',
                    'label'        =>   $value['weight']
                ],
                [
                    'field'        =>   'pro_height',
                    'label'        =>   $value['height']
                ],
                [
                    'field'        =>   'pro_width',
                    'label'        =>   $value['width']
                ],
                [
                    'field'        =>   'pro_depth',
                    'label'        =>   $value['depth']
                ],
                [
                    'field'        =>   'pro_volume',
                    'label'        =>   $value['volume']
                ],
                [
                    'field'        =>   'pro_visible',
                    'label'        =>   $value['visible']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $product = new M_product();
        $post = $this->request->getVar();
        $active = isset($post['pro_isactive']) ? 'Y' : 'N';
        $visible = isset($post['pro_visible']) ? 'Y' : 'N';

        $data = [
            'md_product_id'         => $post['id'],
            'isactive'              => $active,
            // 'm_product_id'          => $post['pro_ref_product'],
            // 'md_principal_id'       => $post['pro_principal'],
            // 'md_pricelist_id'       => $post['pro_pricelist'],
            'md_productgroup_id'    => $post['pro_group'],
            // 'md_uom_id'             => $post['pro_uom'],
            'code'                  => $post['pro_code'],
            'name'                  => $post['pro_name'],
            'description'           => $post['pro_desc'],
            'weight'                => $post['pro_weight'],
            'width'                 => $post['pro_width'],
            'height'                => $post['pro_height'],
            'depth'                 => $post['pro_depth'],
            'volume'                => $post['pro_volume'],
            'qty'                   => $post['pro_qty'],
            'visible'               => $visible
        ];

        if (!$validation->run($post, 'product')) {
            $response = $product->formError();
        } else {
            $result = $product->save($data);
            $response = [['success' => 'success', 'update' => $result]];
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $product = new M_product();
        $result = $product->delete($id);
        $response = [['success' => 'success', 'delete' => $result]];
        return json_encode($response);
    }
}
