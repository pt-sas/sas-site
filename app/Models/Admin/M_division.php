<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_division extends Model
{
    protected $table      = 'md_division';
    protected $primaryKey = 'md_division_id';
    protected $allowedFields = [
        'name',
        'description',
        'isactive',
        'pic'
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
                'error'        =>   'error_div_name',
                'field'        =>   'div_name',
                'label'        =>   $validation->getError('div_name')
            ]
        ];
    }
}
