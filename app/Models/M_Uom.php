<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Uom extends Model
{
    protected $table      = 'md_uom';
    protected $primaryKey = 'md_uom_id';
    protected $allowedFields = [
        'name',
        'description',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Uom';
}
