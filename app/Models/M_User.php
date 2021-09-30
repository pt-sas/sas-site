<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
	protected $table                = 'sys_user';
	protected $primaryKey           = 'sys_user_id';
	protected $allowedFields        = [
		'username',
		'name',
		'description',
		'password',
		'email',
		'isactive',
		'datelastlogin',
		'datepasswordchange',
		'updated_at'
	];
	protected $useTimestamps        = false;
	protected $returnType           = 'App\Entities\User';

	public function detail($arrParam = [], $field = null, $where = null)
	{
		$db = \Config\Database::connect();
		$builder = $db->table($this->table);
		$builder->select($this->table . '.*,' .
			'sur.sys_role_id as role,
			sur.sys_user_role_id');

		$builder->join('sys_user_role sur', 'sur.sys_user_id = ' . $this->table . '.sys_user_id', 'left');
		$builder->join('sys_role sr', 'sur.sys_role_id = sr.sys_role_id', 'left');

		if (count($arrParam) > 0) {
			$builder->where($arrParam);
		} else {
			if (!empty($where)) {
				$builder->where($field, $where);
			}
		}

		$builder->orderBy('sr.name', 'ASC');

		$query = $builder->get();
		return $query;
	}
}
