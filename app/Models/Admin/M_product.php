<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_product extends Model
{
    protected $table      = 'md_product';
    protected $primaryKey = 'md_product_id';
    protected $allowedFields = [
        'code',
        'name',
        'description',
        'weight',
        'width',
        'height',
        'depth',
        'volume',
        'visible',
        'isactive',
        'm_product_id',
        // 'md_principal_id',
        // 'md_pricelist_id',
        'md_productgroup_id'
        // 'md_uom_id'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'product'
            ],
            [
                'error'        =>   'error_pro_code',
                'field'        =>   'pro_code',
                'label'        =>   $validation->getError('pro_code')
            ],
            [
                'error'        =>   'error_pro_name',
                'field'        =>   'pro_name',
                'label'        =>   $validation->getError('pro_name')
            ],
            [
                'error'        =>   'error_pro_qty',
                'field'        =>   'pro_qty',
                'label'        =>   $validation->getError('pro_qty')
            ],
            [
                'error'        =>   'error_pro_weight',
                'field'        =>   'pro_weight',
                'label'        =>   $validation->getError('pro_weight')
            ],
            [
                'error'        =>   'error_pro_group',
                'field'        =>   'pro_group',
                'label'        =>   $validation->getError('pro_group')
            ],
            [
                'error'        =>   'error_pro_height',
                'field'        =>   'pro_height',
                'label'        =>   $validation->getError('pro_height')
            ],
            [
                'error'        =>   'error_pro_width',
                'field'        =>   'pro_width',
                'label'        =>   $validation->getError('pro_width')
            ],
            [
                'error'        =>   'error_pro_depth',
                'field'        =>   'pro_depth',
                'label'        =>   $validation->getError('pro_depth')
            ],
            [
                'error'        =>   'error_pro_volume',
                'field'        =>   'pro_volume',
                'label'        =>   $validation->getError('pro_volume')
            ],
        ];
    }
}
