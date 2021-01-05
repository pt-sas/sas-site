<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_product_group extends Model
{
    protected $table      = 'md_productgroup';
    protected $primaryKey = 'md_productgroup_id';
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
                'error'        =>   'error_prg_code',
                'field'        =>   'prg_code',
                'label'        =>   $validation->getError('prg_code')
            ]
        ];
    }
}
