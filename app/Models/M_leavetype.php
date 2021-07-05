<?php

namespace App\Models;

use CodeIgniter\Model;

class M_leavetype extends Model
{
    protected $table      = 'md_leavetype';
    protected $primaryKey = 'md_leavetype_id';
    protected $allowedFields = [
        'md_leavetype_name',
        'md_leavetype_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'leavetype'
            ],
            [
                'error'        =>   'error_leavetype_name',
                'field'        =>   'leavetype_name',
                'label'        =>   $validation->getError('leavetype_name')
            ],
            [
                'error'        =>   'error_leavetype_description',
                'field'        =>   'leavetype_description',
                'label'        =>   $validation->getError('leavetype_description')
            ]
        ];
    }
}
