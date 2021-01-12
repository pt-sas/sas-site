<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\M_location;

class Location extends BaseController
{
    public function index()
    {
        $this->new_title = 'New Location';
        $this->form_type = 'new_form';

        $data = [
            'button'    => '<button type="button" class="btn bg-gradient-primary btn-sm ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
                <i class="fas fa-plus-circle"> New</i>
            </button>'
        ];
        return view('admin/location/v_location', $data);
    }

    public function showAll()
    {
        $location = new M_location();
        $list = $location->findAll();
        $data = [];

        $number = 0;
        foreach ($list as $value) :
            $row = [];
            $ID = $value['md_location_id'];

            $number++;

            $row[] = $ID;
            $row[] = $number;
            $row[] = $value['name'];
            $row[] = $value['address1'];
            $row[] = $value['address2'];
            $row[] = $value['address3'];
            $row[] = $value['address4'];
            $row[] = $value['district'];
            $row[] = $value['subdistrict'];
            $row[] = $value['city'];
            $row[] = $value['province'];
            $row[] = $value['phone'];
            // $row[] = $value['cellular'];
            $row[] = $value['postal'];
            $row[] = '<center>
                        <a class="btn bg-danger btn-sm" onclick="Openmap(' . "'" . $ID . "'" . ')" title="Maps"><i class="fas fa-map-marker-alt"></i></a>
                    </center>';
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
        $location = new M_location();
        $post = $this->request->getVar();

        $active = isset($post['loc_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'isactive'              => $active,
                'name'                  => $post['loc_name'],
                'description'           => $post['loc_desc'],
                'address1'              => $post['loc_address1'],
                'address2'              => $post['loc_address2'],
                'address3'              => $post['loc_address3'],
                'address4'              => $post['loc_address4'],
                'district'              => $post['loc_district'],
                'subdistrict'           => $post['loc_subdistrict'],
                'city'                  => $post['loc_city'],
                'province'              => $post['loc_province'],
                'phone'                 => $post['loc_phone'],
                'postal'                => $post['loc_postal'],
                'lattitude'             => $post['loc_lat'],
                'longitude'             => $post['loc_long']
            ];

            if (!$validation->run($post, 'location')) {
                $response = $location->formError();
            } else {
                $result = $location->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function show($id)
    {
        $location = new M_location();
        $list = $location->where('md_location_id', $id)->findAll();

        foreach ($list as $value) :
            $response =  [
                [
                    'field'        =>   'title',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'loc_isactive',
                    'label'        =>   $value['isactive']
                ],
                [
                    'field'        =>   'loc_name',
                    'label'        =>   $value['name']
                ],
                [
                    'field'        =>   'loc_desc',
                    'label'        =>   $value['description']
                ],
                [
                    'field'        =>   'loc_address1',
                    'label'        =>   $value['address1']
                ],
                [
                    'field'        =>   'loc_address2',
                    'label'        =>   $value['address2']
                ],
                [
                    'field'        =>   'loc_address3',
                    'label'        =>   $value['address3']
                ],
                [
                    'field'        =>   'loc_address4',
                    'label'        =>   $value['address4']
                ],
                [
                    'field'        =>   'loc_district',
                    'label'        =>   $value['district']
                ],
                [
                    'field'        =>   'loc_subdistrict',
                    'label'        =>   $value['subdistrict']
                ],
                [
                    'field'        =>   'loc_city',
                    'label'        =>   $value['city']
                ],
                [
                    'field'        =>   'loc_province',
                    'label'        =>   $value['province']
                ],
                [
                    'field'        =>   'loc_phone',
                    'label'        =>   $value['phone']
                ],
                [
                    'field'        =>   'loc_postal',
                    'label'        =>   $value['postal']
                ],
                [
                    'field'        =>   'loc_lat',
                    'label'        =>   $value['lattitude']
                ],
                [
                    'field'        =>   'loc_long',
                    'label'        =>   $value['longitude']
                ]
            ];
        endforeach;

        return json_encode($response);
    }

    public function edit()
    {
        $validation = \Config\Services::validation();
        $location = new M_location();
        $post = $this->request->getVar();

        $active = isset($post['loc_isactive']) ? 'Y' : 'N';

        try {
            $data = [
                'md_location_id'        => $post['id'],
                'isactive'              => $active,
                'name'                  => $post['loc_name'],
                'description'           => $post['loc_desc'],
                'address1'              => $post['loc_address1'],
                'address2'              => $post['loc_address2'],
                'address3'              => $post['loc_address3'],
                'address4'              => $post['loc_address4'],
                'district'              => $post['loc_district'],
                'subdistrict'           => $post['loc_subdistrict'],
                'city'                  => $post['loc_city'],
                'province'              => $post['loc_province'],
                'phone'                 => $post['loc_phone'],
                'postal'                => $post['loc_postal'],
                'lattitude'             => $post['loc_lat'],
                'longitude'             => $post['loc_long']
            ];

            if (!$validation->run($post, 'location')) {
                $response = $location->formError();
            } else {
                $result = $location->save($data);
                $response = message('success', true, $result);
            }
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }

    public function destroy($id)
    {
        $location = new M_location();

        try {
            $result = $location->delete($id);
            $response = message('success', true, $result);
        } catch (\Exception $e) {
            $response = message('error', false, $e->getMessage());
        }
        return json_encode($response);
    }
}
