<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnlogin extends Migration
{
	public function up()
	{
		$fields = [
			'datelastlogin'			=> [
				'type'				=> 'TIMESTAMP'
			],
			'datepasswordchange'	=> [
				'type'				=> 'TIMESTAMP'
			]
		];

		$this->forge->addColumn('sys_user', $fields);
	}

	public function down()
	{
		//
	}
}
