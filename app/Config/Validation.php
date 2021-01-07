<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $product = [
		'pro_code' => [
			'label'		=> 'Product Code',
			'rules' 	=> 'required|is_unique[md_product.code,md_product_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'pro_name' => [
			'label'		=> 'Product Name',
			'rules'		=> 'required|is_unique[md_product.name,md_product_id,{id}]',
			'errors'	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'pro_qty' => [
			'label'		=> 'Quantity',
			'rules'		=> 'required'
		],
		'pro_group' => [
			'label'		=> 'Product Group',
			'rules'		=> 'required'
		],
		'pro_weight' => [
			'label'		=> 'Weight',
			'rules'		=> 'required'
		],
		'pro_height' => [
			'label'		=> 'Height',
			'rules'		=> 'required'
		],
		'pro_width' => [
			'label'		=> 'Width',
			'rules'		=> 'required'
		],
		'pro_depth' => [
			'label'		=> 'Depth',
			'rules'		=> 'required'
		],
		'pro_volume' => [
			'label'		=> 'Volume',
			'rules'		=> 'required'
		]
	];

	public $menu = [
		'mnu_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[sys_menu.name,menu_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'mnu_status' => [
			'label'		=> 'Status',
			'rules'		=> 'required'
		]
	];

	public $submenu = [
		'sub_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[sys_submenu.name,sys_submenu_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		],
		'sub_status' => [
			'label'		=> 'Status',
			'rules'		=> 'required'
		]
	];

	public $uom = [
		'uom_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[md_uom.name,md_uom_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		]
	];

	public $bank = [
		'bnk_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[md_bank.name,md_bank_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		]
	];

	public $greeting = [
		'gre_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[md_greeting.name,md_greeting_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		]
	];

	public $division = [
		'div_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[md_division.name,md_division_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		]
	];

	public $principal = [
		'pri_name' => [
			'label'		=> 'Name',
			'rules' 	=> 'required|is_unique[md_principal.name,md_principal_id,{id}]',
			'errors' 	=> [
				'is_unique' => 'This {field} already exists.'
			]
		]
	];
}
