<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Job extends Migration
{
	public function up()
	{
		$this->forge->addColumn('trx_job', [
			'url VARCHAR(255) NOT NULL'
		]);
	}

	public function down()
	{
		//
	}
}
