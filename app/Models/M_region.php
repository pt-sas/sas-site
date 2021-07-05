<?php

namespace App\Models;

use CodeIgniter\Model;

class M_region extends Model
{
    protected $table      = 'md_region';
    protected $primaryKey = 'md_region_id';
    protected $allowedFields = [
        'md_region_name',
        'md_region_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'region'
            ],
            [
                'error'        =>   'error_region_name',
                'field'        =>   'region_name',
                'label'        =>   $validation->getError('region_name')
            ],
            [
                'error'        =>   'error_region_description',
                'field'        =>   'region_description',
                'label'        =>   $validation->getError('region_description')
            ]
        ];
    }
}
