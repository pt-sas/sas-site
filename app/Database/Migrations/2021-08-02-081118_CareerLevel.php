<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CareerLevel extends Migration
{
	public function up()
	{
		$this->forge->dropColumn('trx_job', 'carrer_level');
	}

	public function down()
	{
	}
}
