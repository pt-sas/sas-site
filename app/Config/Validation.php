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
		'location_name' => [
			'label'		=> 'name',
			'rules' 	=> 'required'
		],
		'location_location' => [
			'label'		=> 'location',
			'rules' 	=> 'required'
		],
		'location_address1' => [
			'label'		=> 'address 1',
			'rules'		=> 'required'
		],
		'location_subdistrict' => [
			'label'		=> 'subdistrict',
			'rules' 	=> 'required'
		],
		'location_district' => [
			'label'		=> 'district',
			'rules' 	=> 'required'
		],
		'location_city' => [
			'label'		=> 'city',
			'rules'		=> 'required'
		],
		'location_province' => [
			'label'		=> 'province',
			'rules'		=> 'required'
		],
		'location_phone' => [
			'label'		=> 'phone',
			'rules'		=> 'required'
		],
		'location_postal' => [
			'label'		=> 'postal',
			'rules'		=> 'required'
		],
		'location_longitude' => [
			'label'		=> 'longitude',
			'rules'		=> 'required'
		],
		'location_lattitude' => [
			'label'		=> 'lattitude',
			'rules'		=> 'required'
		]
	];
}
