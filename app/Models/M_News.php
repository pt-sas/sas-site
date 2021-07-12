<?php

namespace App\Models;

use CodeIgniter\Model;

class M_News extends Model
{
    protected $table      = 'trx_news';
    protected $primaryKey = 'trx_news_id';
    protected $allowedFields = [
        'md_image_id',
        'title',
        'content',
        'news_date',
        'start_date',
        'end_date',
        'slug',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\News';
}
