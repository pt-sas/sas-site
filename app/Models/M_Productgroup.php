<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Productgroup extends Model
{
    protected $table      = 'md_category';
    protected $primaryKey = 'md_category_id';
    protected $allowedFields = [
        'md_principal_id',
        'category',
        'description',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Productgroup';

    public function getDetail($url, $level)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('md_category');
        $builder->distinct('md_category.md_category_id, md_category.category');
        $builder->join('md_principal', 'md_principal.md_principal_id = md_category.md_principal_id', 'left');
        $builder->where([
            'md_principal.url' => $url,
            'md_category.level' => $level
        ]);
        $builder->orderBy('category', 'ASC');
        $query = $builder->get()->getResult();
        return $query;
    }

    public function showCategoryBy($principal = null, $category1 = null, $category2 = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('md_category cat');
        $builder->select('cat.md_category_id, cat.category, cat.category_en');
        $builder->distinct();
        $builder->join('md_principal p', 'p.md_principal_id = cat.md_principal_id', 'left');

        if (!empty($category1)) {
            $builder->join('md_productcategory pc', 'cat.md_category_id = pc.category2', 'left');
            $builder->where('pc.category1', $category1);
        }

        if (!empty($category2)) {
            $builder->join('md_productcategory pc', 'cat.md_category_id = pc.category3', 'left');
            $builder->where('pc.category2', $category2);
        }

        if (!empty($principal)) {
            $builder->where('p.url', $principal);
        }

        $builder->orderBy('cat.category', 'ASC');
        $query = $builder->get();
        return $query;
    }
}
