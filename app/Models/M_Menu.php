<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Menu extends Model
{
  protected $table      = 'sys_menu';
  protected $primaryKey = 'sys_menu_id';
  protected $allowedFields = [
    'name',
    'sequence',
    'url',
    'icon',
    'status',
    'isactive'
  ];
  protected $useTimestamps = true;
  protected $returnType = 'App\Entities\Menu';
}
