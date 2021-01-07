<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class M_greeting extends Model
{
    protected $table      = 'md_greeting';
    protected $primaryKey = 'md_greeting_id';
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
                'field'        =>   'greeting'
            ],
            [
                'error'        =>   'error_gre_name',
                'field'        =>   'gre_name',
                'label'        =>   $validation->getError('gre_name')
            ]
        ];
    }
}
