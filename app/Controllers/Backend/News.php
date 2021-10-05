<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_News;
use App\Models\M_Image;

class News extends BaseController
{
	protected $table = 'trx_news';
	protected $path_folder = 'custom/image/news/';

	public function index()
	{
		return $this->template->render('backend/news/v_news');
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
			$row[] = $value->title_en;
			$row[] = $this->picture->render($this->path_folder, $value->md_image_id);
			$row[] = format_dmy($value->news_date);
			$row[] = active($value->isactive);
			$row[] = $this->template->table_button($ID);
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
		$image = new M_Image();

		$post = $this->request->getVar();
		$file = $this->request->getFile('md_image_id');
		$imgName = '';
		$newfilename = '';

		if (!empty($file)) {
			$imgName = $file->getName();

			// Renaming file before upload
			$temp = explode(".", $imgName);
			$newfilename = round(microtime(true)) . '.' . end($temp);
		}

		// Mapping to property
		$post['md_image_id'] = $newfilename;

		$slug = url_title($post['title'], '-', true);

		try {
			$eNews->fill($post);
			$eNews->isactive = setCheckbox(isset($post['isactive']));
			$eNews->slug = $slug;

			if (!$validation->run($post, 'news')) {
				$response =	$this->field->errorValidation($this->table, $post);
			} else {
				$image_id = $image->insert_image($newfilename, $this->path_folder);

				if (isset($image_id)) {
					$eNews->md_image_id = $image_id;
				}

				$result = $news->save($eNews);

				// Move to folder
				$file->move($this->path_folder, $newfilename);
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
		$list = $news->detail('trx_news_id', $id);
		$reponse = $this->field->store($this->table, $list->getResult(), $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$eNews = new \App\Entities\News();
		$news = new M_News();
		$image = new M_Image();

		$image_id = 0;

		$post = $this->request->getVar();
		$row = $news->detail('trx_news_id', $post['id'])->getRow();

		$file = $this->request->getFile('md_image_id');
		$imgName = '';
		$newfilename = '';

		if (!empty($file)) {
			$imgName = $file->getName();

			// Renaming file before upload
			$temp = explode(".", $imgName);
			$newfilename = round(microtime(true)) . '.' . end($temp);
		}

		$validation->setRules([
			'title' => [
				'label'		=> 'news title',
				'rules' 	=> 'required'
			],
			'content' => [
				'label'		=> 'news content',
				'rules' 	=> 'required'
			],
			'title_en' => [
				'label'		=> 'news title (English)',
				'rules' 	=> 'required'
			],
			'content_en' => [
				'label'		=> 'news content (English)',
				'rules' 	=> 'required'
			],
			'news_date' => [
				'label'		=> 'posted date',
				'rules' 	=> 'required'
			]
		]);

		// Check if upload new image
		if (!empty($imgName)) {
			$post['md_image_id'] = $newfilename;

			$validation->setRules([
				'md_image_id' => [
					'label'		=>	'image',
					'rules'		=>	'max_size[md_image_id, 3024]|is_image[md_image_id]'
				]
			]);
		} else {
			// Check empty image post
			if (!empty($post['md_image_id'])) {
				$image_id = $row->image_id;
			} else {
				$validation->setRules([
					'md_image_id' => [
						'label'		=>	'image',
						'rules'		=>	'uploaded[md_image_id]|max_size[md_image_id, 3024]|is_image[md_image_id]|mime_in[md_image_id,image/jpg,image/jpeg,image/png]'
					]
				]);
				$image_id = $post['md_image_id'];
			}
		}

		$slug = url_title($post['title'], '-', true);

		try {
			$eNews->fill($post);
			$eNews->trx_news_id = $post['id'];
			$eNews->isactive = setCheckbox(isset($post['isactive']));
			$eNews->slug = $slug;

			if (!$validation->withRequest($this->request)->run()) {
				$response =	$this->field->errorValidation($this->table, $post);
			} else {
				if (!empty($imgName) && file_exists($row->md_image_id)) {
					// Remove old image path directory
					unlink($this->path_folder . $row->image);

					// Delete old image data
					$delete = $image->delete($row->image_id);

					if ($delete) {
						// Insert new data image
						$image_id = $image->insert_image($newfilename, $this->path_folder);

						// Move to folder
						$file->move($this->path_folder, $newfilename);
					}
				} else if (!empty($imgName)) {
					if (!empty($row->image_id)) {
						// Delete old image data
						$delete = $image->delete($row->image_id);
					}
					// Insert new data image
					$image_id = $image->insert_image($newfilename, $this->path_folder);

					// Move to folder
					$file->move($this->path_folder, $newfilename);
				}

				if (isset($image_id)) {
					$eNews->md_image_id = $image_id;
				}

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
		$image = new M_Image();

		$image_id = 0;

		$row = $news->detail('trx_news_id', $id)->getRow();

		if (!empty($row->image_id)) {
			$image_id = $row->image_id;
		}

		try {
			// Remove image path directory
			$unlink = unlink($this->path_folder . $row->image);

			if ($unlink) {
				$image->delete($image_id);
			}
			$result = $news->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}
}
