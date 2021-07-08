<?php

namespace App\Models;

use CodeIgniter\Model;

class M_about extends Model
{
    protected $table      = 'trx_compro';
    protected $primaryKey = 'trx_compro_id';
    protected $allowedFields = [
        'tb_cp_overview',
        'tb_cp_vision',
        'tb_cp_mision',
        'tb_cp_value',
        'tb_cp_objectives',
        'isactive'
    ];
    protected $useTimestamps = true;


    public function formError()
    {
        $validation = \Config\Services::validation();

        return [
            [
                'error'        =>   true,
                'field'        =>   'About'
            ],
            [
                'error'        =>   'error_about_overview',
                'field'        =>   'about_overview',
                'label'        =>   $validation->getError('about_overview')
            ],
            [
                'error'        =>   'error_about_vision',
                'field'        =>   'about_vision',
                'label'        =>   $validation->getError('about_vision')
            ],
            [
                'error'        =>   'error_about_mision',
                'field'        =>   'about_mision',
                'label'        =>   $validation->getError('about_mision')
            ],
            [
                'error'        =>   'error_about_value',
                'field'        =>   'about_value',
                'label'        =>   $validation->getError('about_value')
            ],
            [
                'error'        =>   'error_about_objectives',
                'field'        =>   'about_objectives',
                'label'        =>   $validation->getError('about_objectives')
            ]
        ];
    }

    public function findAbout($id)
    {
        return $this->where('trx_compro_id', $id)->first();
    }
}
