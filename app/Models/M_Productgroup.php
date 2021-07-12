<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Productgroup extends Model
{
    protected $table      = 'md_productgroup';
    protected $primaryKey = 'md_productgroup_id';
    protected $allowedFields = [
        'name',
        'description',
        'md_principal_id'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Productgroup';
}
