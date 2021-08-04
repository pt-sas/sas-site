<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Job extends Model
{
  protected $table      = 'trx_job';
  protected $primaryKey = 'trx_job_id';
  protected $allowedFields = [
    'position',
    'description',
    'requirement',
    'description_en',
    'requirement_en',
    'md_division_id',
    'posted_date',
    'expired_date',
    'url',
    'level',
    'isactive'
  ];
  protected $useTimestamps = true;
  protected $returnType = 'App\Entities\Job';

  public function showPositionBy($field, $where = null, $level = null, $keyword = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select($this->table . '.*,
                    d.name as division_name');
    $builder->join('md_division d', 'd.md_division_id = ' . $this->table . '.md_division_id', 'left');
    $builder->where($field, $where);
    // $builder->where('DATE(job.expired_date)', 'CURDATE()', false);

    if (!empty($keyword)) {
      $builder->like($this->table . '.position', $keyword, 'both');
      $builder->like($this->table . '.description', $keyword, 'both');
    }

    if (!empty($level)) {
      $builder->where($this->table . '.level', $level);
    }

    $builder->orderBy($this->table . '.posted_date', 'DESC');
    $query = $builder->get();
    return $query;
  }
}
