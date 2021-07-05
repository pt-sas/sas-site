<?php

namespace App\Models;

use CodeIgniter\Model;

class M_employeestatus extends Model
{
    protected $table      = 'md_employeestatus';
    protected $primaryKey = 'md_employeestatus_id';
    protected $allowedFields = [
        'md_employeestatus_name',
        'md_employeestatus_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'employeestatus'
            ],
            [
                'error'        =>   'error_employeestatus_name',
                'field'        =>   'employeestatus_name',
                'label'        =>   $validation->getError('employeestatus_name')
            ],
            [
                'error'        =>   'error_employeestatus_description',
                'field'        =>   'employeestatus_description',
                'label'        =>   $validation->getError('employeestatus_description')
            ]
        ];
    }
}
