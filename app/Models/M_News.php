<?php

namespace App\Models;

use CodeIgniter\Model;

class M_News extends Model
{
    protected $table      = 'trx_news';
    protected $primaryKey = 'trx_news_id';
    protected $allowedFields = [
        'md_image_id',
        'title',
        'content',
        'news_date',
        'slug',
        'isactive'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\News';

  	public function detail($field, $where = null)
  	{
  		$db = \Config\Database::connect();
  		if (!empty($where)) {
  			return $db->query("SELECT
  						mdp.trx_news_id ,
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
  		$builder = $db->table('trx_news');
  		$builder->select('title, news_date, content, slug, image_url');
  		$builder->join('md_image', 'md_image.md_image_id = trx_news.md_image_id');
  		$query = $builder->get()->getResult();
  		return $query;
  	}

  	public function getDetail($slug)
  	{
  		$db = \Config\Database::connect();
  		$builder = $db->table('trx_news');
  		$builder->select('title, news_date, content, image_url');
  		$builder->join('md_image', 'md_image.md_image_id = trx_news.md_image_id');
      $builder->where('slug',$slug);
  		$query = $builder->get()->getRow();
  		return $query;
  	}
}
