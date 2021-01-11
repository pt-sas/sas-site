<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_account extends Model
{
    protected $table      = 'md_bankaccount';
    protected $primaryKey = 'md_bankaccount_id';
    protected $allowedFields = [
        'name',
        'md_bank_id',
        'accountno',
        'branch',
        'description',
        'isactive',
        'isdefault'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'account'
            ],
            [
                'error'        =>   'error_acc_name',
                'field'        =>   'acc_name',
                'label'        =>   $validation->getError('acc_name')
            ]
        ];
    }
}
