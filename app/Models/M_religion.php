<?php

namespace App\Models;

use CodeIgniter\Model;

class M_religion extends Model
{
    protected $table      = 'md_religion';
    protected $primaryKey = 'md_religion_id';
    protected $allowedFields = [
        'md_religion_name',
        'md_religion_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'religion'
            ],
            [
                'error'        =>   'error_religion_name',
                'field'        =>   'religion_name',
                'label'        =>   $validation->getError('religion_name')
            ],
            [
                'error'        =>   'error_religion_description',
                'field'        =>   'religion_description',
                'label'        =>   $validation->getError('religion_description')
            ]
        ];
    }
}
