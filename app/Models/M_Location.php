<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Location extends Model
{
    protected $table      = 'md_location';
    protected $primaryKey = 'md_location_id';
    protected $allowedFields = [
        'name',
        'name_en',
        'description',
        'location',
        'address1',
        'subdistrict',
        'district',
        'city',
        'province',
        'phone',
        'cellular',
        'postal',
        'lattitude',
        'longitude',
        'url',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Location';
}
