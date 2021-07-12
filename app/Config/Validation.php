<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $mailbox = [
		'mailbox_name' => [
			'label'		=> 'overview',
			'rules' 	=> 'required'
		],
		'mailbox_email' => [
			'label'		=> 'vision',
			'rules'		=> 'required'
		],
		'mailbox_subject' => [
			'label'		=> 'mission',
			'rules'		=> 'required'
		],
		'mailbox_inquiry' => [
			'label'		=> 'objectives',
			'rules'		=> 'required'
		],
		'mailbox_phone' => [
			'label'		=> 'vision',
			'rules'		=> 'required'
		],
		'mailbox_message' => [
			'label'		=> 'mission',
			'rules'		=> 'required'
		]
	];

	public $about = [
		'about_overview' => [
			'label'		=> 'overview',
			'rules' 	=> 'required'
		],
		'about_vision' => [
			'label'		=> 'vision',
			'rules'		=> 'required'
		],
		'about_mision' => [
			'label'		=> 'mission',
			'rules'		=> 'required'
		],
		'about_objectives' => [
			'label'		=> 'objectives',
			'rules'		=> 'required'
		]
	];

	public $location = [
		'name' => [
			'label'		=> 'name',
			'rules' 	=> 'required'
		],
		'location' => [
			'label'		=> 'location',
			'rules' 	=> 'required'
		],
		'address1' => [
			'label'		=> 'address 1',
			'rules'		=> 'required'
		],
		'subdistrict' => [
			'label'		=> 'subdistrict',
			'rules' 	=> 'required'
		],
		'district' => [
			'label'		=> 'district',
			'rules' 	=> 'required'
		],
		'city' => [
			'label'		=> 'city',
			'rules'		=> 'required'
		],
		'province' => [
			'label'		=> 'province',
			'rules'		=> 'required'
		],
		'phone' => [
			'label'		=> 'phone',
			'rules'		=> 'required'
		],
		'postal' => [
			'label'		=> 'postal',
			'rules'		=> 'required'
		],
		'longitude' => [
			'label'		=> 'longitude',
			'rules'		=> 'required'
		],
		'lattitude' => [
			'label'		=> 'lattitude',
			'rules'		=> 'required'
		]
	];

	public $principal = [
		'name' => [
			'rules' 	=>	'required|is_unique[md_principal.name,md_principal,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'url' => [
			'rules'		=>	'required|valid_url'
		],
		'md_image_id' => [
			'label'		=>	'image',
			'rules'		=>	'uploaded[md_image_id]|max_size[md_image_id, 1024]|is_image[md_image_id]|mime_in[md_image_id,image/jpg,image/jpeg,image/png]'
		]
	];
}
