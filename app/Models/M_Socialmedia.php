<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Socialmedia extends Model
{
    protected $table      = 'md_socialmedia';
    protected $primaryKey = 'md_socialmedia_id';
    protected $allowedFields = [
        'name',
        'description',
        'icon',
        'url',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Socialmedia';
}
