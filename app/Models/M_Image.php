<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Image extends Model
{
	protected $table                = 'md_image';
	protected $DBGroup = 'default';
	protected $primaryKey           = 'md_image_id';
	protected $allowedFields        = ['name', 'url'];
	protected $useTimestamps        = true;


	public function insert_image($image, $path)
	{
		$db      = \Config\Database::connect($this->DBGroup);
		$builder = $db->table($this->table);

		$data = [
			'name'		=> $image,
			'image_url'	=> $path . $image
		];

		$builder->insert($data);
		return $db->insertID();
	}
}
