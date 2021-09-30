<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnlogin extends Migration
{
	public function up()
	{
		$fields = [
			'datelastlogin'			=> [
				'type'				=> 'TIMESTAMP NULL',
			],
			'datepasswordchange'	=> [
				'type'				=> 'TIMESTAMP NULL',
			]
		];

		$this->forge->addColumn('sys_user', $fields);
	}

	public function down()
	{
		//
	}
}
