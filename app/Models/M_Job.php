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


  public function showAll()
  {
    $db = \Config\Database::connect();
    $builder = $db->table('trx_job');
    $builder->select('md_division.name as division_name, trx_job_id, position, level, trx_job.description, trx_job.requirement, trx_job.description_en, trx_job.requirement_en, posted_date, expired_date, trx_job.isactive, trx_job.url');
    $builder->join('md_division', 'md_division.md_division_id = trx_job.md_division_id', 'left');
    $query = $builder->get()->getResult();
    return $query;
  }

	public function showPositionBy($level = null, $keyword = null)
	{
		$db = \Config\Database::connect();
    $builder = $db->table('trx_job');
    $builder->select('md_division.name as division_name, trx_job_id, position, level, trx_job.description, trx_job.requirement, trx_job.description_en, trx_job.requirement_en, posted_date, expired_date, trx_job.isactive, trx_job.url');
    $builder->join('md_division', 'md_division.md_division_id = trx_job.md_division_id', 'left');
		$builder->where('isactive', 'Y');
		if (!empty($keyword)) {
			$builder->like('position', $keyword, 'both');
			$builder->like('description', $keyword, 'both');
		}
		if (!empty($level)) {
			$builder->where('level', $level);
		}

		$builder->orderBy('posted_date', 'DESC');
		$query = $builder->get();
		return $query;
	}
}
