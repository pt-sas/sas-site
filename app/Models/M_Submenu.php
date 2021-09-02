<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Submenu extends Model
{
  protected $table      = 'sys_submenu';
  protected $primaryKey = 'sys_submenu_id';
  protected $allowedFields = [
    'name',
    'sequence',
    'url',
    // 'icon',
    'status',
    'sys_menu_id',
    'isactive'
  ];
  protected $useTimestamps = true;
  protected $returnType = 'App\Entities\Submenu';

  public function detail($field = null, $where = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select($this->table . '.*,
                    m.name as parent');
    $builder->join('sys_menu m', 'm.sys_menu_id = ' . $this->table . '.sys_menu_id', 'left');

    if (!empty($where)) {
      $builder->where($field, $where);
    }

    // $builder->orderBy($this->table . '.name', 'ASC');
    $query = $builder->get();
    return $query;
  }
}
