<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Promo;

class Promo extends BaseController
{
	protected $table = 'trx_promo';
	protected $path_folder = 'custom/image/promo/';

	public function index()
	{
		return $this->template->render('backend/promo/v_promo');
	}

	public function showAll()
	{
		$promo = new M_Promo();
		$list = $promo->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->trx_promo_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->title;
			$row[] = $value->start_date;
			$row[] = $value->end_date;
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
		$ePromo = new \App\Entities\Promo();

		$promo = new M_Promo();
		$post = $this->request->getVar();

		try {
			$ePromo->fill($post);
			$ePromo->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'promo')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$result = $promo->save($ePromo);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}
		return json_encode($response);
	}

	public function show($id)
	{
		$promo = new M_Promo();
		$list = $promo->detail('trx_promo_id', $id);
		$reponse = $this->field->store($this->table, $list->getResult(), $list);
		return json_encode($reponse);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$ePromo = new \App\Entities\Promo();
		$promo = new M_Promo();
		$image = new M_Image();

		$image_id = 0;

		$post = $this->request->getVar();
		$row = $news->detail('trx_promo_id', $post['id'])->getRow();

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
				'label'		=> 'title',
				'rules' 	=> 'required'
			],
			'content' => [
				'label'		=> 'content',
				'rules' 	=> 'required'
			],
			'title_en' => [
				'label'		=> 'title (English)',
				'rules' 	=> 'required'
			],
			'content_en' => [
				'label'		=> 'content (English)',
				'rules' 	=> 'required'
			],
			'start_date' => [
				'label'		=> 'start date',
				'rules' 	=> 'required'
			],
			'end_date' => [
				'label'		=> 'end date',
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
			$ePromo->fill($post);
			$ePromo->trx_promo_id = $post['id'];
			$ePromo->isactive = setCheckbox(isset($post['isactive']));
			$ePromo->slug = $slug;

			if (!$validation->withRequest($this->request)->run()) {
				$response =	$this->field->errorValidation($this->table);
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

				$result = $promo->save($ePromo);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function destroy($id)
	{
		$promo = new M_Promo();
		$image = new M_Image();

		$image_id = 0;

		$row = $promo->detail('trx_promo_id', $id)->getRow();

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
