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

	public function showAll()
	{
		$db = \Config\Database::connect();
		$builder = $db->table('md_product');
		$builder->select('md_product.*');
		$query = $builder->get()->getResult();
		return $query;
	}

	public function getDetail($url)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('md_product');
		$builder->select('md_product.*');
		$builder->join('md_principal', 'md_principal.md_principal_id = md_product.md_principal_id');
		$builder->where('md_principal.url', $url);
		$query = $builder->get()->getResult();
		return $query;
	}

	public function getProductgroup($id)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('md_product');
		if ($id != '') {
			$builder->select('*');
			$builder->where('md_productgroup_id', $id);
		} else {
			$builder->select('*');
		}
		$query = $builder->get()->getResult();
		return $query;
	}

	public function showProductBy($principal = null, $category1 = null, $category2 = null, $category3 = null, $keyword = null)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('md_product p');
		$builder->select('p.code,
						p.name,
						p.description,
						p.url');
		// $builder->distinct();
		$builder->join('md_productcategory pc', 'p.md_product_id = pc.md_product_id', 'left');
		$builder->join('md_principal pr', 'pr.md_principal_id = p.md_principal_id', 'left');
		$builder->where('p.isactive', 'Y');
		if (!empty($principal)) {
			$builder->where('pr.url', $principal);
		}

		if (!empty($keyword)) {
			$builder->like('p.name', $keyword, 'both');
			$builder->orLike('p.description', $keyword, 'both');
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

		$builder->orderBy('p.code', 'ASC');
		$query = $builder->get();
		return $query;
	}
}
