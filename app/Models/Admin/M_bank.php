<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_bank extends Model
{
    protected $table      = 'md_bank';
    protected $primaryKey = 'md_bank_id';
    protected $allowedFields = [
        'name',
        'description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'bank'
            ],
            [
                'error'        =>   'error_bnk_name',
                'field'        =>   'bnk_name',
                'label'        =>   $validation->getError('bnk_name')
            ]
        ];
    }
}
