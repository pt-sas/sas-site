<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Principal extends Model
{
    protected $table      = 'md_principal';
    protected $primaryKey = 'md_principal_id';
    protected $allowedFields = [
        'name',
        'description',
        'md_image_id',
        'url',
        'seqno',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Principal';

    public function detail($field, $where = null)
    {
        $db = \Config\Database::connect();
        if (!empty($where)) {
            return $db->query("SELECT
						mdp.md_principal_id,
						mdp.isactive,
						mdp.name,
						mdp.description,
						mdi.name as image,
						mdi.image_url as md_image_id,
						mdp.url,
						mdp.seqno,
						mdp.md_image_id as image_id
						FROM $this->table mdp
						LEFT JOIN md_image mdi ON mdp.md_image_id = mdi.md_image_id
						WHERE $field = $where");
        } else {
            return $where;
        }
    }

    public function showAll()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('md_principal');
        $builder->select('md_principal.name as principal_name, md_principal.url, image_url, seqno');
        $builder->join('md_image', 'md_image.md_image_id = md_principal.md_image_id');
    		$builder->where('md_principal.isactive', 'Y');
    		$builder->orderby('seqno', 'ASC');
        $query = $builder->get()->getResult();
        return $query;
    }
}
