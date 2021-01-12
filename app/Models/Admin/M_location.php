<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_location extends Model
{
    protected $table      = 'md_location';
    protected $primaryKey = 'md_location_id';
    protected $allowedFields = [
        'name',
        'description',
        'location',
        'address1',
        'address2',
        'address3',
        'address4',
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
                'field'        =>   'location'
            ],
            [
                'error'        =>   'error_loc_name',
                'field'        =>   'loc_name',
                'label'        =>   $validation->getError('loc_name')
            ]
        ];
    }
}
