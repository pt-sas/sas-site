<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Division extends Model
{
    protected $table      = 'md_division';
    protected $primaryKey = 'md_division_id';
    protected $allowedFields = [
        'name',
        'description'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Division';
}
