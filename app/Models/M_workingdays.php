<?php

namespace App\Models;

use CodeIgniter\Model;

class M_workingdays extends Model
{
    protected $table      = 'md_workingdays';
    protected $primaryKey = 'md_workingdays_id';
    protected $allowedFields = [
        'md_workingdays_name',
        'md_workingdays_timein',
        'md_workingdays_timeout',
        'md_workingdays_description',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'workingdays'
            ],
            [
                'error'        =>   'error_workingdays_name',
                'field'        =>   'workingdays_name',
                'label'        =>   $validation->getError('workingdays_name')
            ],
            [
                'error'        =>   'error_workingdays_timein',
                'field'        =>   'workingdays_timein',
                'label'        =>   $validation->getError('workingdays_timein')
            ],
            [
                'error'        =>   'error_workingdays_timeout',
                'field'        =>   'workingdays_timeout',
                'label'        =>   $validation->getError('workingdays_timeout')
            ],
            [
                'error'        =>   'error_workingdays_description',
                'field'        =>   'workingdays_description',
                'label'        =>   $validation->getError('workingdays_description')
            ]
        ];
    }
}
