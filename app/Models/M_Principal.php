<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Principal extends Model
{
    protected $table      = 'md_principal';
    protected $primaryKey = 'md_principal_id';
    protected $allowedFields = [
        'name',
        'description',
        'logo',
        'url'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Principal';
}
