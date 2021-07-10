<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Promo extends Model
{
    protected $table      = 'trx_promo';
    protected $primaryKey = 'trx_promo_id';
    protected $allowedFields = [
        'md_image_id',
        'title',
        'content',
        'start_date',
        'end_date',
        'slug',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\News';
}
