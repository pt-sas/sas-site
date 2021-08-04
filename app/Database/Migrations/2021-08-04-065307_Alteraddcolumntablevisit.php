<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alteraddcolumntablevisit extends Migration
{
	public function up()
	{
		$fields = [
			'version'	=> [
				'type'	=> 'VARCHAR (20) NOT NULL',
				'after'	=> 'browser'
			],
			'mobile'	=> [
				'type'	=> 'VARCHAR (20) NOT NULL',
				'after'	=> 'platform'
			]
		];

		$this->forge->addColumn('sys_visit', $fields);
	}

	public function down()
	{
		// 
	}
}
