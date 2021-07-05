<?php

namespace App\Models;

use CodeIgniter\Model;

class M_massleave extends Model
{
    protected $table      = 'md_massleave';
    protected $primaryKey = 'md_massleave_id';
    protected $allowedFields = [
        'md_massleave_date',
        'md_massleave_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'massleave'
            ],
            [
                'error'        =>   'error_massleave_date',
                'field'        =>   'massleave_date',
                'label'        =>   $validation->getError('massleave_date')
            ],
            [
                'error'        =>   'error_massleave_description',
                'field'        =>   'massleave_description',
                'label'        =>   $validation->getError('massleave_description')
            ]
        ];
    }
}
