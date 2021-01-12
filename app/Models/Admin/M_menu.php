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
        'isactive',
        'url',
        'sequence',
        'icon'
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
            ],
            [
                'error'        =>   'error_mnu_url',
                'field'        =>   'mnu_url',
                'label'        =>   $validation->getError('mnu_url')
            ],
            [
                'error'        =>   'error_mnu_sequence',
                'field'        =>   'mnu_sequence',
                'label'        =>   $validation->getError('mnu_sequence')
            ]
        ];
    }
}
