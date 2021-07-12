<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_News;

class News extends BaseController
{
	protected $table = 'trx_news';

	public function index()
	{
		$this->new_title = 'News';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>',
		];
		return $this->template->render('backend/news/v_news', $data);
	}

	public function showAll()
	{
		$news = new M_News();
		$list = $news->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->trx_news_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->title;
			$row[] = $value->news_date;
			$row[] = active($value->isactive);
			$row[] = '<center>
						<a class="btn" onclick="Edit(' . "'" . $ID . "'" . ')" title="Edit"><i class="far fa-edit text-info"></i></a>
						<a class="btn" onclick="Destroy(' . "'" . $ID . "'" . ')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
					</center>';
			$data[] = $row;
		endforeach;

		$result = array('data' => $data);
		return json_encode($result);
	}

	public function create()
	{
		$validation = \Config\Services::validation();
		$eNews = new \App\Entities\News();

		$news = new M_News();
		$post = $this->request->getVar();

		try {
			$eNews->fill($post);
			$eNews->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'news')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $news->save($eNews);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$news = new M_News();
		$list = $news->where('trx_news_id', $id)->findAll();
		$reponse = $this->field->store($this->table, $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eNews = new \App\Entities\News();

		$news = new M_News();
		$post = $this->request->getVar();

		try {
			$eNews->fill($post);
			$eNews->trx_news_id = $post['id'];
			$eNews->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'news')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $news->save($eNews);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function destroy($id)
	{
		$news = new M_News();

		try {
			$result = $news->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
