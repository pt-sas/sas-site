<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jobdesc extends Migration
{
	public function up()
	{
		$this->forge->addColumn('trx_job', [
			'description_en TEXT NOT NULL',
			'requirement_en TEXT NOT NULL',
		]);
	}

	public function down()
	{
		//
	}
}
