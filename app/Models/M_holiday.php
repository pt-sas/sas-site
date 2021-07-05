<?php

namespace App\Models;

use CodeIgniter\Model;

class M_holiday extends Model
{
    protected $table      = 'md_holiday';
    protected $primaryKey = 'md_holiday_id';
    protected $allowedFields = [
        'md_holiday_date',
        'md_holiday_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'holiday'
            ],
            [
                'error'        =>   'error_holiday_date',
                'field'        =>   'holiday_date',
                'label'        =>   $validation->getError('holiday_date')
            ],
            [
                'error'        =>   'error_holiday_description',
                'field'        =>   'holiday_description',
                'label'        =>   $validation->getError('holiday_description')
            ]
        ];
    }
}
