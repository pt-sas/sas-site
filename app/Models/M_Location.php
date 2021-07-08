<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Location extends Model
{
    protected $table      = 'md_location';
    protected $primaryKey = 'md_location_id';
    protected $allowedFields = [
        'name',
        'description',
        'location',
        'address1',
        'subdistrict',
        'district',
        'city',
        'province',
        'phone',
        'cellular',
        'postal',
        'lattitude',
        'longitude',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'branch'
            ],
            [
                'error'        =>   'error_location_name',
                'field'        =>   'location_name',
                'label'        =>   $validation->getError('location_name')
            ],
            [
                'error'        =>   'error_location_location',
                'field'        =>   'location_location',
                'label'        =>   $validation->getError('location_location')
            ],
            [
                'error'        =>   'error_location_address1',
                'field'        =>   'location_address1',
                'label'        =>   $validation->getError('location_address1')
            ],
            [
                'error'        =>   'error_location_subdistrict',
                'field'        =>   'location_subdistrict',
                'label'        =>   $validation->getError('location_subdistrict')
            ],
            [
                'error'        =>   'error_location_district',
                'field'        =>   'location_district',
                'label'        =>   $validation->getError('location_district')
            ],
            [
                'error'        =>   'error_location_city',
                'field'        =>   'location_city',
                'label'        =>   $validation->getError('location_city')
            ],
            [
                'error'        =>   'error_location_province',
                'field'        =>   'location_province',
                'label'        =>   $validation->getError('location_province')
            ],
            [
                'error'        =>   'error_location_phone',
                'field'        =>   'location_phone',
                'label'        =>   $validation->getError('location_phone')
            ],
            [
                'error'        =>   'error_location_postal',
                'field'        =>   'location_postal',
                'label'        =>   $validation->getError('location_postal')
            ],
            [
                'error'        =>   'error_location_longitude',
                'field'        =>   'location_longitude',
                'label'        =>   $validation->getError('location_longitude')
            ],
            [
                'error'        =>   'error_location_lattitude',
                'field'        =>   'location_lattitude',
                'label'        =>   $validation->getError('location_lattitude')
            ],
        ];
    }
}
