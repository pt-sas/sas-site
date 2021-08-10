<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Product extends Model
{
	protected $table      = 'md_product';
	protected $primaryKey = 'md_product_id';
	protected $allowedFields = [
		'm_product_id',
		'md_principal_id',
		'md_productgroup_id',
		'md_uom_id',
		'code',
		'name',
		'description',
		'color',
		'weight',
		'width',
		'height',
		'depth',
		'volume',
		'visible',
		'downloadable',
		'url',
		'url_toped',
		'url_shopee',
		'ur_jdid',
		'isactive'
	];
	protected $useTimestamps = true;
	protected $returnType = 'App\Entities\Product';

	public function detail($field, $where = null)
	{
		$db = \Config\Database::connect();
		if (!empty($where)) {
			return $db->query("SELECT
  						mdp.md_product_id ,
  						mdp.isactive,
  						mdp.title,
  						mdp.content,
  						mdp.news_date,
  						mdp.start_date,
  						mdp.end_date,
  						mdp.slug,
  						mdi.name as image,
  						mdi.image_url as md_image_id,
  						mdp.md_image_id as image_id
  						FROM $this->table mdp
  						LEFT JOIN md_image mdi ON mdp.md_image_id = mdi.md_image_id
  						WHERE $field = $where");
		} else {
			return $where;
		}
	}

	public function showProductBy($param = [], $principal = null, $category1 = null, $category2 = null, $category3 = null, $keyword = null, $limit = 0, $offset = 0)
	{
		$db = \Config\Database::connect();
		$builder = $db->table($this->table);
		$builder->select(
			$this->table . '.code,' .
				$this->table . '.name,' .
				$this->table . '.description,' .
				$this->table . '.url'
		);

		$builder->distinct($this->table . '.code');
		$builder->join('md_productcategory pc', $this->table . '.md_product_id = pc.md_product_id', 'left');
		$builder->join('md_principal pr', 'pr.md_principal_id = ' . $this->table . '.md_principal_id', 'left');

		if (count($param) > 0) {
			$builder->where($param);
		}

		if (!empty($principal)) {
			$builder->where('pr.url', $principal);
		}

		if (!empty($keyword)) {
			$builder->like($this->table . '.name', $keyword, 'both');
			$builder->orLike($this->table . '.description', $keyword, 'both');
		}

		if (!empty($category1)) {
			$builder->where('pc.category1', $category1);
		}

		if (!empty($category2)) {
			$builder->where('pc.category2', $category2);
		}

		if (!empty($category3)) {
			$builder->where('pc.category3', $category3);
		}

		$builder->orderBy($this->table . '.code', 'ASC');

		if (!empty($limit)) {
			$builder->limit($limit, $offset);
		}

		$query = $builder->get();
		return $query;
	}
}
