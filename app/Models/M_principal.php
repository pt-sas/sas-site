<?php

namespace App\Models;

use CodeIgniter\Model;

class M_principal extends Model
{
	protected $table                = 'md_principal';
	protected $primaryKey           = 'md_principal_id';
	protected $allowedFields        = ['name', 'description', 'url', 'md_image_id', 'isactive'];
	protected $returnType           = 'App\Entities\Principal';
	protected $useTimestamps        = true;

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
						mdp.md_image_id as image_id
						FROM $this->table mdp
						LEFT JOIN Md_Image mdi ON mdp.Md_Image_ID = mdi.Md_Image_ID
						WHERE $field = $where");
		} else {
			return $where;
		}
	}
}
