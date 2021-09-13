<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\M_User;

class M_UserRole extends Model
{
  protected $table      = 'sys_user_role';
  protected $primaryKey = 'sys_user_role_id';
  protected $allowedFields = [
    'sys_role_id',
    'sys_user_id',
    'isactive'
  ];
  protected $useTimestamps = true;
  protected $returnType = 'App\Entities\Userrole';
  protected $db;

  public function __construct()
  {
    parent::__construct();
    $this->db = db_connect();
  }

  public function create($post)
  {
    $user = new M_User();
    $builder = $this->db->table($this->table);
    $result = [];
    $data = [];

    $data['isactive'] = setCheckbox(isset($post['isactive']));
    $data['sys_user_id'] = $post['sys_user_id'];

    // Insert data
    if (!isset($post['id'])) {
      foreach ($post['role'] as $value) :
        $data['sys_role_id'] = $value;

        $result = $builder->insert($data);
      endforeach;
    } else {
      $list = $user->detail(['sur.sys_user_id' => $post['sys_user_id']])->getResult();
      $arrRole = [];

      foreach ($list as $row) :
        // Delete role when update user
        if (!in_array($row->role, $post['role'])) {
          $result = $builder->where('sys_user_role_id', $row->sys_user_role_id)->delete();
        } else {
          $result = $builder->where('sys_user_role_id', $row->sys_user_role_id)->update($data);
        }

        // Get list role in this user before update
        $arrRole[] = $row->role;
      endforeach;

      // Add new role when update user
      foreach ($post['role'] as $value) :
        if (!in_array($value, $arrRole)) {
          $data['sys_role_id'] = $value;

          $result = $builder->insert($data);
        }
      endforeach;
    }

    return $result;
  }
}
