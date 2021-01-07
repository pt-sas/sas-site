<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_submenu extends Model
{
    protected $table      = 'sys_submenu';
    protected $primaryKey = 'sys_submenu_id';
    protected $allowedFields = [
        'name',
        'status',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'submenu'
            ],
            [
                'error'        =>   'error_sub_name',
                'field'        =>   'sub_name',
                'label'        =>   $validation->getError('sub_name')
            ],
            [
                'error'        =>   'error_sub_status',
                'field'        =>   'sub_status',
                'label'        =>   $validation->getError('sub_status')
            ]
        ];
    }
}
