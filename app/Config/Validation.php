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

	public $company = [
		'company_name' => [
			'label'		=> 'company name',
			'rules' 	=> 'required|max_length[100]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'company_address' => [
			'label'		=> 'company address',
			'rules'		=> 'required'
		],
		'company_phone' => [
			'label'		=> 'company phone',
			'rules'		=> 'required'
		],
		'company_hrd' => [
			'label'		=> 'head of HRD',
			'rules'		=> 'required'
		],
		'company_hrdmail' => [
			'label'		=> 'HRD e-mail',
			'rules'		=> 'required'
		],
		'company_bpjslimit' => [
			'label'		=> 'BPJS limit',
			'rules'		=> 'required'
		],
		'company_pensionlimit' => [
			'label'		=> 'company pension limit',
			'rules'		=> 'required'
		],
		'company_cutoff' => [
			'label'		=> 'cut off',
			'rules'		=> 'required'
		],
		'company_pensionage' => [
			'label'		=> 'pension age',
			'rules'		=> 'required'
		],
		'company_positioncostlimit' => [
			'label'		=> 'position cost limit',
			'rules'		=> 'required'
		],
		'company_class1limit' => [
			'label'		=> 'BPJS class 1 limit',
			'rules'		=> 'required'
		],
		'company_class2limit' => [
			'label'		=> 'BPJS class 2 limit',
			'rules'		=> 'required'
		],
		'company_overtime' => [
			'label'		=> 'overtime limit',
			'rules'		=> 'required'
		]
	];

	public $workingdays = [
		'workingdays_name' => [
			'label'		=> 'workingdays name',
			'rules' 	=> 'required|max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'workingdays_timein' => [
			'label'		=> 'workingdays timein',
			'rules'		=> 'required'
		],
		'workingdays_timeout' => [
			'label'		=> 'workingdays timeout',
			'rules'		=> 'required'
		],
		'workingdays_description' => [
			'label'		=> 'workingdays description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $holiday = [
		'holiday_date' => [
			'label'		=> 'holiday date',
			'rules' 	=> 'required|max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'holiday_description' => [
			'label'		=> 'holiday description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $leavetype = [
		'leavetype_name' => [
			'label'		=> 'leavetype name',
			'rules' 	=> 'required|max_length[50]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'leavetype_description' => [
			'label'		=> 'leavetype description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $massleave = [
		'massleave_date' => [
			'label'		=> 'massleave date',
			'rules' 	=> 'required|max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'massleave_description' => [
			'label'		=> 'massleave description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $region = [
		'region_name' => [
			'label'		=> 'region name',
			'rules' 	=> 'required|max_length[50]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'region_description' => [
			'label'		=> 'region description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $branch = [
		'region_id' => [
			'label'		=> 'region',
			'rules' 	=> 'required'
		],
		'branch_name' => [
			'label'		=> 'branch name',
			'rules' 	=> 'required|max_length[50]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'branch_address' => [
			'label'		=> 'address',
			'rules'		=> 'max_length[200]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'branch_phone' => [
			'label'		=> 'phone number',
			'rules' 	=> 'max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $division = [
		'division_name' => [
			'label'		=> 'division name',
			'rules' 	=> 'required|max_length[50]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'division_description' => [
			'label'		=> 'division description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $religion = [
		'religion_name' => [
			'label'		=> 'religion name',
			'rules' 	=> 'required|max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'religion_description' => [
			'label'		=> 'religion description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $bloodtype = [
		'bloodtype_name' => [
			'label'		=> 'bloodtype name',
			'rules' 	=> 'required|max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'bloodtype_description' => [
			'label'		=> 'bloodtype description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $position = [
		'position_name' => [
			'label'		=> 'position name',
			'rules' 	=> 'required|max_length[50]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'position_description' => [
			'label'		=> 'position description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];

	public $employeestatus = [
		'employeestatus_name' => [
			'label'		=> 'employeestatus name',
			'rules' 	=> 'required|max_length[20]',
			'errors' 	=> [
				'max_length' => 'Your {field} is too long.'
			]
		],
		'employeestatus_description' => [
			'label'		=> 'employeestatus description',
			'rules'		=> 'max_length[100]',
			'errors'	=> [
				'max_length' => 'Your {field} is too long.'
			]
		]
	];
}
