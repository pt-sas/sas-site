<?php

namespace App\Models;

use CodeIgniter\Model;

class M_AccessMenu extends Model
{
  protected $table      = 'sys_access_menu';
  protected $primaryKey = 'sys_access_menu_id';
  protected $allowedFields = [
    'sys_role_id',
    'sys_menu_id',
    'sys_submenu_id',
    'isview',
    'iscreate',
    'isupdate',
    'isdelete',
  ];
  protected $useTimestamps = true;
  protected $returnType = 'App\Entities\Accessmenu';
  protected $db;

  public function __construct()
  {
    parent::__construct();
    $this->db = db_connect();
  }

  public function create($post)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);

    foreach (json_decode($post['roles']) as $value) :
      $data = [];
      $data['sys_role_id'] = $post['sys_role_id'];
      $data['isactive'] = setCheckbox(isset($post['isactive']));

      if ($value->menu === 'parent') {
        $data['sys_menu_id'] = $value->menu_id;
        $data['sys_submenu_id'] = 0;
      } else {
        $data['sys_menu_id'] = $value->menu;
        $data['sys_submenu_id'] = $value->menu_id;
      }

      $data['isview'] = $value->view;
      $data['iscreate'] = $value->create;
      $data['isupdate'] = $value->update;
      $data['isdelete'] = $value->delete;

      if (isset($post['id']) && !empty($value->access_id)) {
        $result = $builder->where('sys_access_menu_id', $value->access_id)->update($data);
      } else {
        $result = $builder->insert($data);
      }
    endforeach;

    return $result;
  }
}
