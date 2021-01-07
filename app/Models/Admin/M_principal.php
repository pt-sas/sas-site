<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_principal extends Model
{
    protected $table      = 'md_principal';
    protected $primaryKey = 'md_principal_id';
    protected $allowedFields = [
        'name',
        'description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'principal'
            ],
            [
                'error'        =>   'error_pri_name',
                'field'        =>   'pri_name',
                'label'        =>   $validation->getError('pri_name')
            ]
        ];
    }
}
