<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modifycolumnposition extends Migration
{
	public function up()
	{
		$fields = [
			'position' => [
				'name'	=> 'value',
				'type'	=> 'VARCHAR(64) NOT NULL'
			]
		];

		$this->forge->modifyColumn('trx_job', $fields);
	}

	public function down()
	{
		//
	}
}
