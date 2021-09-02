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
		'name' => [
			'rules' 	=> 'required'
		],
		'email' => [
			'rules'		=> 'required|valid_email'
		],
		'subject' => [
			'rules'		=> 'required'
		],
		'inquiry' => [
			'rules'		=> 'required'
		],
		'phone' => [
			'rules'		=> 'required'
		],
		'message' => [
			'rules'		=> 'required'
		]
	];

	public $about = [
		'tb_cp_overview' => [
			'label'		=> 'overview',
			'rules' 	=> 'required'
		],
		'tb_cp_vision' => [
			'label'		=> 'vision',
			'rules'		=> 'required'
		],
		'tb_cp_mision' => [
			'label'		=> 'mission',
			'rules'		=> 'required'
		],
		'tb_cp_objectives' => [
			'label'		=> 'objectives',
			'rules'		=> 'required'
		],
		'tb_cp_overview_en' => [
			'label'		=> 'overview',
			'rules' 	=> 'required'
		],
		'tb_cp_vision_en' => [
			'label'		=> 'vision',
			'rules'		=> 'required'
		],
		'tb_cp_mision_en' => [
			'label'		=> 'mission',
			'rules'		=> 'required'
		],
		'tb_cp_objectives_en' => [
			'label'		=> 'objectives',
			'rules'		=> 'required'
		]
	];

	public $location = [
		'name' => [
			'label'		=> 'name',
			'rules' 	=> 'required'
		],
		'name_en' => [
			'label'		=> 'name english',
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
		],
		'url' => [
			'label'		=> 'direction link',
			'rules'		=> 'required'
		]
	];

	public $division = [
		'name' => [
			'label'		=> 'division name',
			'rules' 	=> 'required'
		]
	];

	public $job = [
		'md_division_id' => [
			'label'		=> 'division',
			'rules' 	=> 'required'
		],
		'value' => [
			'label'		=> 'job position',
			'rules' 	=> 'required'
		],
		'level' => [
			'rules' 	=> 'required'
		],
		'description' => [
			'label'		=> 'job description',
			'rules' 	=> 'required'
		],
		'requirement' => [
			'label'		=> 'job requirement',
			'rules' 	=> 'required'
		],
		'description_en' => [
			'label'		=> 'job description (English)',
			'rules' 	=> 'required'
		],
		'requirement_en' => [
			'label'		=> 'job requirement (English)',
			'rules' 	=> 'required'
		],
		'posted_date' => [
			'label'		=> 'posted date',
			'rules' 	=> 'required'
		],
		'expired_date' => [
			'label'		=> 'expired date',
			'rules' 	=> 'required'
		],
		'url' => [
			'label'		=> 'jobstreet url',
			'rules' 	=> 'required|valid_url'
		]
	];

	public $news = [
		'title' => [
			'rules' 	=> 'required'
		],
		'content' => [
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
		'news_date' => [
			'label'		=> 'posted date',
			'rules' 	=> 'required'
		],
		'md_image_id' => [
			'label'		=>	'image',
			'rules'		=>	'uploaded[md_image_id]|max_size[md_image_id, 3024]|is_image[md_image_id]|mime_in[md_image_id,image/jpg,image/jpeg,image/png]'
		]
	];

	public $promo = [
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
		],
		'md_image_id' => [
			'label'		=>	'image',
			'rules'		=>	'uploaded[md_image_id]|max_size[md_image_id, 3024]|is_image[md_image_id]|mime_in[md_image_id,image/jpg,image/jpeg,image/png]'
		]
	];

	public $productgroup = [
		'md_principal_id' => [
			'label'		=> 'principal',
			'rules' 	=> 'required'
		],
		'name' => [
			'label'		=> 'product group name',
			'rules'		=> 'required'
		]
	];

	public $principal = [
		'name' => [
			'rules' 	=>	'required|is_unique[md_principal.name,md_principal_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'url' => [
			'rules'		=>	'required|valid_url'
		],
		'md_image_id' => [
			'label'		=>	'image',
			'rules'		=>	'uploaded[md_image_id]|max_size[md_image_id, 3024]|is_image[md_image_id]|mime_in[md_image_id,image/jpg,image/jpeg,image/png]'
		],
		'seqno' => [
			'rules' 	=>	'required'
		],
	];

	public $socialmedia = [
		'name' => [
			'label'		=> 'social media name',
			'rules' 	=> 'required'
		],
		'icon' => [
			'rules'		=>	'required'
		],
		'url' => [
			'rules'		=>	'required|valid_url'
		]
	];

	public $product = [
		'code' => [
			'rules' 	=>	'required|is_unique[md_product.code,md_product_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'name' => [
			'rules' 	=>	'required|is_unique[md_product.name,md_product_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'm_product_id' => [
			'label'		=> 'iDempiere code',
			'rules' 	=>	'required|is_unique[md_product.m_product_id,md_product_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'url' => [
			'label'		=>	'product image',
			'rules'		=>	'uploaded[url]|max_size[url, 3024]|is_image[url]|mime_in[url,image/jpg,image/jpeg,image/png]'
		],
		'md_uom_id' => [
			'label'		=> 	'uom',
			'rules'		=>	'required'
		],
		'md_principal_id' => [
			'label'		=> 	'principal',
			'rules'		=>	'required'
		],
		'description' => [
			'label'		=>	'content',
			'rules'		=>	'required'
		],
		'height' => [
			'rules'		=>	'max_length[7]'
		],
		'weight' => [
			'rules'		=>	'max_length[7]'
		],
		'depth' => [
			'rules'		=>	'max_length[7]'
		],
		'width' => [
			'rules'		=>	'max_length[7]'
		],
		'volume' => [
			'rules'		=>	'max_length[7]'
		]
	];

	public $menu = [
		'name' => [
			'rules' 	=>	'required|is_unique[sys_menu.name,sys_menu_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'url' => [
			'rules'		=>	'required|valid_url'
		],
		'icon' => [
			'rules'		=>	'required'
		],
		'sequence' => [
			'rules'		=>	'required'
		]
	];

	public $submenu = [
		'name' => [
			'rules' 	=>	'required|is_unique[sys_submenu.name,sys_submenu_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'url' => [
			'rules'		=>	'required|valid_url'
		],
		'sequence' => [
			'rules'		=>	'required'
		]
	];

	public $role = [
		'name' => [
			'rules' 	=>	'required|is_unique[sys_role.name,sys_role_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		]
	];
}
