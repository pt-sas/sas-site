<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Visit extends Model
{
    protected $table      = 'sys_visit';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'ipaddress',
        'browser',
        'platform',
        'time',
    ];
    protected $useTimestamps = true;
    protected $returnType = 'App\Entities\Visit';


    public function count($ipaddress) {
        $db = \Config\Database::connect();
        $agent = \Config\Services::request()->getUserAgent();

        $builder = $db->table('sys_visit');
        $builder->where(['ipaddress' => $ipaddress]);
        $builder->where('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 2 HOUR) AND NOW()');
        $query = $builder->countAllResults();
        if ($query == 0) {
          $data = [
            'ipaddress' => $ipaddress,
            'browser' 	=> $agent->getBrowser(),
            'platform' 	=> $agent->getPlatform(),
            'time'      => date('Y-m-j H:i:s')
      		];
      		$builder->insert($data);
        }
  	}
}
