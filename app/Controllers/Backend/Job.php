<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Division;
use App\Models\M_Job;

class Job extends BaseController
{
	protected $table = 'trx_job';

	public function index()
	{
		$division = new M_Division();

		$data = [
			'division'	=> $division->where('isactive', 'Y')
				->orderBy('name', 'ASC')
				->findAll()
		];

		return $this->template->render('backend/job/v_job', $data);
	}

	public function showAll()
	{
		$job = new M_Job();
		$list = $job->showPositionBy()->getResult();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->trx_job_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->division_name;
			$row[] = $value->value;
			$row[] = format_dmy($value->posted_date);
			$row[] = format_dmy($value->expired_date);
			$row[] = active($value->isactive);
			$row[] = $this->template->table_button($ID);
			$data[] = $row;
		endforeach;

		$result = array('data' => $data);
		return json_encode($result);
	}

	// create job
	public function create()
	{
		$validation = \Config\Services::validation();
		$eJob = new \App\Entities\Job();

		$job = new M_Job();
		$post = $this->request->getVar();

		try {
			$eJob->fill($post);
			$eJob->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'job')) {
				$response =	$this->field->errorValidation($this->table, $post);
			} else {
				$result = $job->save($eJob);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$job = new M_Job();
		$list = $job->where('trx_job_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eJob = new \App\Entities\Job();

		$job = new M_Job();
		$post = $this->request->getVar();

		try {
			$eJob->fill($post);
			$eJob->trx_job_id = $post['id'];
			$eJob->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'job')) {
				$response =	$this->field->errorValidation($this->table, $post);
			} else {
				$result = $job->save($eJob);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function destroy($id)
	{
		$job = new M_Job();

		try {
			$result = $job->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
