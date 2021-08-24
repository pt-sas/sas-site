<?php

namespace App\Models;

use CodeIgniter\Model;

class M_ProductCategory extends Model
{
    protected $table      = 'md_productcategory';
    protected $primaryKey = 'md_productcategory_id';
    protected $allowedFields = [
        'md_product_id',
        'md_principal_id',
        'category1',
        'category2',
        'category3'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Productcategory';

    public function create($post, $action)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);

        if ($action == 'insert') {
            $data = [
                'md_product_id'     => $post['id'],
                'md_principal_id'   => $post['md_principal_id'],
                'category1'         => $post['category1'],
                'category2'         => $post['category2'],
                'category3'         => $post['category3']
            ];

            return $builder->insert($data);
        } else {
            $data = [
                'md_principal_id'   => $post['md_principal_id'],
                'category1'         => $post['category1'],
                'category2'         => $post['category2'],
                'category3'         => $post['category3']
            ];

            return $builder->where('md_product_id', $post['id'])->update($data);
        }
    }
}
