<?php

namespace App\Models;

use CodeIgniter\Model;

class M_bloodtype extends Model
{
    protected $table      = 'md_bloodtype';
    protected $primaryKey = 'md_bloodtype_id';
    protected $allowedFields = [
        'md_bloodtype_name',
        'md_bloodtype_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'bloodtype'
            ],
            [
                'error'        =>   'error_bloodtype_name',
                'field'        =>   'bloodtype_name',
                'label'        =>   $validation->getError('bloodtype_name')
            ],
            [
                'error'        =>   'error_bloodtype_description',
                'field'        =>   'bloodtype_description',
                'label'        =>   $validation->getError('bloodtype_description')
            ]
        ];
    }
}
