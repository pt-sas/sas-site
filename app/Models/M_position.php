<?php

namespace App\Models;

use CodeIgniter\Model;

class M_position extends Model
{
    protected $table      = 'md_position';
    protected $primaryKey = 'md_position_id';
    protected $allowedFields = [
        'md_position_name',
        'md_position_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'position'
            ],
            [
                'error'        =>   'error_position_name',
                'field'        =>   'position_name',
                'label'        =>   $validation->getError('position_name')
            ],
            [
                'error'        =>   'error_position_description',
                'field'        =>   'position_description',
                'label'        =>   $validation->getError('position_description')
            ]
        ];
    }
}
