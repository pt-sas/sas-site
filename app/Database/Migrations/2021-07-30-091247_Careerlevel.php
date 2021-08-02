<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Careerlevel extends Migration
{
	public function up()
	{
		$fields = [
			'level' => [
				'type' 			=> 'VARCHAR (2) NOT NULL',
			]
		];

		$this->forge->addColumn('trx_job', $fields);
	}

	public function down()
	{
		//
	}
}
