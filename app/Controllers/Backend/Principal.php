<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\M_Principal;
use App\Models\M_Image;

class Principal extends BaseController
{
	protected $table = 'md_principal';
	protected $path_folder = 'custom/image/principal/';

	public function index()
	{
		$this->new_title = 'Principal';
		$this->form_type = 'new_form';

		$data = [
			'title'    	=> '' . $this->new_title . '',
			'button'    => '<button type="button" class="btn btn-primary btn-sm btn-round ml-auto ' . $this->form_type . ' ' . $this->modal_type . '" title="' . $this->new_title . '">
												<i class="fa fa-plus fa-fw"></i> ' . $this->new_title . '
										 </button>'
		];

		return $this->template->render('backend/principal/v_principal', $data);
	}

	public function showAll()
	{
		$principal = new M_Principal();
		$list = $principal->findAll();
		$data = [];

		$number = 0;
		foreach ($list as $value) :
			$row = [];
			$ID = $value->md_principal_id;

			$number++;

			$row[] = $ID;
			$row[] = $number;
			$row[] = $value->name;
			$row[] = $value->description;
			$row[] = $value->url;
			$row[] = $value->url;
			$row[] = active($value->isactive);
			$row[] = '<center>
						<a class="btn" onclick="Edit(' . "'" . $ID . "'" . ')" title="Edit"><i class="far fa-edit text-info"></i></a>
						<a class="btn" onclick="Destroy(' . "'" . $ID . "'" . ')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
					</center>';
			$data[] = $row;
		endforeach;

		$result = ['data' => $data];
		return json_encode($result);
	}

	public function create()
	{
		$validation = \Config\Services::validation();
		$ePrincipal = new \App\Entities\Principal();
		$principal = new M_Principal();
		$image = new M_Image();

		$post = $this->request->getVar();

		$file = $this->request->getFile('md_image_id');
		$imgName = $file->getName();

		// Renaming file before upload
		$temp = explode(".", $imgName);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		// Mapping to property
		$post['md_image_id'] = $newfilename;

		try {
			$ePrincipal->fill($post);
			$ePrincipal->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->run($post, 'principal')) {
				$response =	$this->field->errorValidation($this->table);
			} else {
				$image_id = $image->insert_image($newfilename, $this->path_folder);

				if (isset($image_id)) {
					$ePrincipal->md_image_id = $image_id;
				}
				$result = $principal->save($ePrincipal);

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
		$principal = new M_Principal();
		$list = $principal->detail('md_principal_id', $id);
		$response = $this->field->store($this->table, $list->getResult(), $list);
		return json_encode($response);
	}

	public function edit()
	{
		$validation = \Config\Services::validation();
		$ePrincipal = new \App\Entities\Principal();
		$principal = new M_Principal();
		$image = new M_Image();

		$image_id = 0;

		$post = $this->request->getVar();
		$row = $principal->detail('md_principal_id', $post['id'])->getRow();

		$file = $this->request->getFile('md_image_id');
		$imgName = $file->getName();

		// Renaming file before upload
		$temp = explode(".", $imgName);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		$validation->setRules([
			'name'	=> [
				'rules' => 'required'
			],
			'url'	=> 'required|valid_url'
		]);

		// Check if upload new image
		if (!empty($imgName)) {
			$post['md_image_id'] = $newfilename;

			$validation->setRules([
				'md_image_id' => [
					'label'		=>	'image',
					'rules'		=>	'max_size[md_image_id, 1024]|is_image[md_image_id]'
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
						'rules'		=>	'uploaded[md_image_id]|max_size[md_image_id, 1024]|is_image[md_image_id]|mime_in[md_image_id,image/jpg,image/jpeg,image/png]'
					]
				]);
				$image_id = $post['md_image_id'];
			}
		}

		try {
			$ePrincipal->fill($post);
			$ePrincipal->md_principal_id = $post['id'];
			$ePrincipal->isactive = setCheckbox(isset($post['isactive']));

			if (!$validation->withRequest($this->request)->run()) {
				$response = $this->field->errorValidation($this->table);
			} else {
				if (!empty($imgName)) {
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
				}

				if (isset($image_id)) {
					$ePrincipal->md_image_id = $image_id;
				}

				$result = $principal->save($ePrincipal);
				$response = message('success', true, $result);
			}
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}

	public function destroy($id)
	{
		$principal = new M_Principal();
		$image = new M_Image();

		$image_id = 0;

		$row = $principal->detail('md_principal_id', $id)->getRow();

		if (!empty($row->image_id)) {
			$image_id = $row->image_id;
		}

		try {
			// Remove image path directory
			$unlink = unlink($this->path_folder . $row->image);

			if ($unlink) {
				$image->delete($image_id);
			}

			$result = $principal->delete($id);
			$response = message('success', true, $result);
		} catch (\Exception $e) {
			$response = message('error', false, $e->getMessage());
		}

		return json_encode($response);
	}
}
