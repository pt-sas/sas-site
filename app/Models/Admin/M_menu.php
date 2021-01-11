<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_menu extends Model
{
    protected $table      = 'sys_menu';
    protected $primaryKey = 'sys_menu_id';
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
                'field'        =>   'menu'
            ],
            [
                'error'        =>   'error_mnu_name',
                'field'        =>   'mnu_name',
                'label'        =>   $validation->getError('mnu_name')
            ],
            [
                'error'        =>   'error_mnu_status',
                'field'        =>   'mnu_status',
                'label'        =>   $validation->getError('mnu_status')
            ]
        ];
    }
}
