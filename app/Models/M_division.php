<?php

namespace App\Models;

use CodeIgniter\Model;

class M_division extends Model
{
    protected $table      = 'md_division';
    protected $primaryKey = 'md_division_id';
    protected $allowedFields = [
        'md_division_name',
        'md_division_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'division'
            ],
            [
                'error'        =>   'error_division_name',
                'field'        =>   'division_name',
                'label'        =>   $validation->getError('division_name')
            ],
            [
                'error'        =>   'error_division_description',
                'field'        =>   'division_description',
                'label'        =>   $validation->getError('division_description')
            ]
        ];
    }
}
