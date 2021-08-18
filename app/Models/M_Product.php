<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
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
	protected $column_order = [
		'',
		'',
		'code',
		'name',
		'',
		'm_product_id',
		'principal',
		'md_category1',
		'md_category2',
		'md_category3',
		'color',
		'weight',
		'width',
		'height',
		'depth',
		'volume',
		'visible',
		'isactive',
	];
	protected $column_search = [
		'md_product.code',
		'md_product.name',
		'md_product.m_product_id',
		'md_product.color',
		'md_product.weight',
		'md_product.width',
		'md_product.height',
		'md_product.depth',
		'md_product.volume',
		'pr.name',
		'cat1.category',
		'cat2.category',
		'cat3.category'
	];
	protected $order = ['code' => 'ASC'];
	protected $request;
	protected $db;
	protected $builder;

	public function __construct(RequestInterface $request)
	{
		parent::__construct();
		$this->db = db_connect();
		$this->request = $request;
		$this->builder = $this->db->table($this->table);
	}

	private function getAll($field = null, $where = null)
	{
		$this->builder->select(
			$this->table . '.md_product_id,' .
				$this->table . '.code,' .
				$this->table . '.name,' .
				$this->table . '.m_product_id,' .
				$this->table . '.color,' .
				$this->table . '.weight,' .
				$this->table . '.width,' .
				$this->table . '.height,' .
				$this->table . '.depth,' .
				$this->table . '.volume,' .
				$this->table . '.visible,' .
				$this->table . '.isactive,' .
				$this->table . '.url as image, 
				pr.name as principal,			
				cat1.category as md_category1,
				cat2.category as md_category2,
				cat3.category as md_category3'
		);

		$this->builder->join('md_principal pr', 'pr.md_principal_id = ' . $this->table . '.md_principal_id', 'left');
		$this->builder->join('md_productcategory pc', $this->table . '.md_product_id = pc.md_product_id', 'left');
		$this->builder->join('md_category cat1', 'pc.category1 = cat1.md_category_id', 'left');
		$this->builder->join('md_category cat2', 'pc.category2 = cat2.md_category_id', 'left');
		$this->builder->join('md_category cat3', 'pc.category3 = cat3.md_category_id', 'left');
	}

	private function getDatatablesQuery()
	{
		$this->getAll();

		$i = 0;
		foreach ($this->column_search as $item) :
			if ($this->request->getPost('search')['value']) {
				if ($i === 0) {
					$this->builder->groupStart();
					$this->builder->like($item, $this->request->getPost('search')['value']);
				} else {
					$this->builder->orLike($item, $this->request->getPost('search')['value']);
				}
				if (count($this->column_search) - 1 == $i)
					$this->builder->groupEnd();
			}
			$i++;
		endforeach;

		if ($this->request->getPost('order')) {
			$this->builder->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->builder->orderBy(key($order), $order[key($order)]);
		}
	}

	public function getDatatables()
	{
		$this->getDatatablesQuery();
		if ($this->request->getPost('length') != -1)
			$this->builder->limit($this->request->getPost('length'), $this->request->getPost('start'));
		$query = $this->builder->get();
		return $query->getResult();
	}

	public function countFiltered()
	{
		$this->getDatatablesQuery();
		return $this->builder->countAllResults();
	}

	public function countAll()
	{
		$tbl_storage = $this->db->table($this->table);
		return $tbl_storage->countAllResults();
	}

	public function detail($field, $where = null, $path = null)
	{
		$this->getAll();

		if (!empty($path)) {
			$this->builder->select('CASE WHEN ' . $this->table . ' . url <> "" THEN CONCAT("' . $path . '",' . $this->table . ' . url) 
							ELSE ' . $this->table . ' . url
							END AS url');
		}

		$this->builder->select(
			$this->table . '.description,' .
				$this->table . '.url_toped,' .
				$this->table . '.url_shopee,' .
				$this->table . '.url_jdid,' .
				$this->table . '.md_principal_id,' .
				$this->table . '.md_uom_id,
			pc.category1,
			pc.category2,
			pc.category3'
		);

		if (!empty($where)) {
			$this->builder->where($field, $where);
		}

		$query = $this->builder->get();
		return $query;
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
