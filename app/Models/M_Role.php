<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Role extends Model
{
  protected $table      = 'sys_role';
  protected $primaryKey = 'sys_role_id';
  protected $allowedFields = [
    'name',
    'description',
    'isactive'
  ];
  protected $useTimestamps = true;
  protected $returnType = 'App\Entities\Role';

  public function detail($param = [], $field = null, $where = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);

    $builder->select($this->table . '.*,
                    am.sys_access_menu_id,
                    am.sys_menu_id,
                    am.sys_submenu_id,
                    am.isview,
                    am.iscreate,
                    am.isupdate,
                    am.isdelete');
    $builder->join('sys_access_menu am', 'am.sys_role_id = ' . $this->table . '.sys_role_id', 'left');

    if (count($param) > 0) {
      $builder->where($param);
    }

    if (!empty($where)) {
      $builder->where($field, $where);
    }

    $query = $builder->get();
    return $query;
  }
}
