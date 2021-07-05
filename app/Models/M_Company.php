<?php

namespace App\Models;

use CodeIgniter\Model;

class M_company extends Model
{
    protected $table      = 'md_company';
    protected $primaryKey = 'md_company_id';
    protected $allowedFields = [
        'md_company_name',
        'md_company_address',
        'md_company_phone',
        'md_company_hrd',
        'md_company_hrdmail',
        'md_company_bpjslimit',
        'md_company_pensionlimit',
        'md_company_cutoff',
        'md_company_pensionage',
        'md_company_positioncostlimit',
        'md_company_class1limit',
        'md_company_class2limit',
        'md_company_overtime',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'company'
            ],
            [
                'error'        =>   'error_company_name',
                'field'        =>   'company_name',
                'label'        =>   $validation->getError('company_name')
            ],
            [
                'error'        =>   'error_company_address',
                'field'        =>   'company_address',
                'label'        =>   $validation->getError('company_address')
            ],
            [
                'error'        =>   'error_company_phone',
                'field'        =>   'company_phone',
                'label'        =>   $validation->getError('company_phone')
            ],
            [
                'error'        =>   'error_company_hrd',
                'field'        =>   'company_hrd',
                'label'        =>   $validation->getError('company_hrd')
            ],
            [
                'error'        =>   'error_company_hrdmail',
                'field'        =>   'company_hrdmail',
                'label'        =>   $validation->getError('company_hrdmail')
            ],
            [
                'error'        =>   'error_company_bpjslimit',
                'field'        =>   'company_bpjslimit',
                'label'        =>   $validation->getError('company_bpjslimit')
            ],
            [
                'error'        =>   'error_company_pensionlimit',
                'field'        =>   'company_pensionlimit',
                'label'        =>   $validation->getError('company_pensionlimit')
            ],
            [
                'error'        =>   'error_company_cutoff',
                'field'        =>   'company_cutoff',
                'label'        =>   $validation->getError('company_cutoff')
            ],
            [
                'error'        =>   'error_company_pensionage',
                'field'        =>   'company_pensionage',
                'label'        =>   $validation->getError('company_pensionage')
            ],
            [
                'error'        =>   'error_company_positioncostlimit',
                'field'        =>   'company_positioncostlimit',
                'label'        =>   $validation->getError('company_positioncostlimit')
            ],
            [
                'error'        =>   'error_company_class1limit',
                'field'        =>   'company_class1limit',
                'label'        =>   $validation->getError('company_class1limit')
            ],
            [
                'error'        =>   'error_company_class2limit',
                'field'        =>   'company_class2limit',
                'label'        =>   $validation->getError('company_class2limit')
            ],
            [
                'error'        =>   'error_company_overtime',
                'field'        =>   'company_overtime',
                'label'        =>   $validation->getError('company_overtime')
            ]
        ];
    }

    public function findCompany($id)
    {
        return $this->where('md_company_id', $id)->first();
    }
}
