<?php

namespace App\Models;

use CodeIgniter\Model;

class M_branch extends Model
{
    protected $table      = 'md_branch';
    protected $primaryKey = 'md_branch_id';
    protected $allowedFields = [
        'md_branch_name',
        'md_branch_address',
        'md_branch_phone',
        'md_region_id',
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
                'error'        =>   'error_branch_name',
                'field'        =>   'branch_name',
                'label'        =>   $validation->getError('branch_name')
            ],
            [
                'error'        =>   'error_branch_address',
                'field'        =>   'branch_address',
                'label'        =>   $validation->getError('branch_address')
            ],
            [
                'error'        =>   'error_branch_phone',
                'field'        =>   'branch_phone',
                'label'        =>   $validation->getError('branch_phone')
            ],
            [
                'error'        =>   'error_region_id',
                'field'        =>   'region_id',
                'label'        =>   $validation->getError('region_id')
            ],
            [
                'error'        =>   'error_branch_isactive',
                'field'        =>   'branch_isactive',
                'label'        =>   $validation->getError('branch_isactive')
            ]
        ];
    }
}
