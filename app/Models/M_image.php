<?php

namespace App\Models;

use CodeIgniter\Model;

class M_image extends Model
{
	protected $table                = 'md_image';
	protected $primaryKey           = 'md_image_id';
	protected $allowedFields        = ['name', 'url'];
	protected $useTimestamps        = true;


	public function insert_image($image, $path)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table($this->table);

		$data = [
			'name'		=> $image,
			'image_url'	=> $path . $image
		];

		$builder->insert($data);
		return $db->insertID();
	}
}
