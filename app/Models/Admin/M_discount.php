<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_discount extends Model
{
    protected $table      = 'md_discount';
    protected $primaryKey = 'md_discount_id';
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
                'field'        =>   'account'
            ],
            [
                'error'        =>   'error_dis_name',
                'field'        =>   'dis_name',
                'label'        =>   $validation->getError('dis_name')
            ]
        ];
    }
}
