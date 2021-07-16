<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Product extends Model
{
    protected $table      = 'md_product';
    protected $primaryKey = 'md_product_id';
    protected $allowedFields = [
        'md_image_id',
        'title',
        'content',
        'news_date',
        'slug',
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
  						LEFT JOIN Md_Image mdi ON mdp.Md_Image_ID = mdi.Md_Image_ID
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
      $builder->where('url', $url);
  		$query = $builder->get()->getResult();
  		return $query;
  	}

    public function getProductgroup($id)
  	{
  		$db = \Config\Database::connect();
  		$builder = $db->table('md_product');
  		if($id != ''){
        $builder->select('*');
    		$builder->where('md_productgroup_id',$id);
      } else {
        $builder->select('*');
      }
      $query = $builder->get()->getResult();
  		return $query;
    }
}
