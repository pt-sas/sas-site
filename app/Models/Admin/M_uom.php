<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_uom extends Model
{
    protected $table      = 'md_uom';
    protected $primaryKey = 'md_uom_id';
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
                'field'        =>   'uom'
            ],
            [
                'error'        =>   'error_uom_name',
                'field'        =>   'uom_name',
                'label'        =>   $validation->getError('uom_name')
            ]
        ];
    }
}
