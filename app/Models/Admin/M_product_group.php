<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_product_group extends Model
{
    protected $table      = 'md_productgroup';
    protected $primaryKey = 'md_productgroup_id';
    protected $allowedFields = [
        'isactive',
        'name',
        'description',
        'md_principal_id'
    ];
    protected $useTimestamps = true;

    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'product_group'
            ],
            [
                'error'        =>   'error_gro_name',
                'field'        =>   'gro_name',
                'label'        =>   $validation->getError('gro_name')
            ],
            [
                'error'        =>   'error_gro_principal',
                'field'        =>   'gro_principal',
                'label'        =>   $validation->getError('gro_principal')
            ]
        ];
    }
}
