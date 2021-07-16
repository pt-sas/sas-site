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
        'md_principal_id',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Productgroup';

    public function getDetail($url)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('md_productgroup');
        $builder->select('md_productgroup_id, md_productgroup.name as name');
        $builder->join('md_principal', 'md_principal.md_principal_id = md_productgroup.md_principal_id');
        $builder->where('url',$url);
        $query = $builder->get()->getResult();
        return $query;
    }
}
