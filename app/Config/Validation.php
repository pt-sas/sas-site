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
		],
	];
}
