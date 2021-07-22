<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class About extends Migration
{
	public function up()
	{
		$this->forge->addColumn('trx_compro', [
			'tb_cp_overview_en VARCHAR(512) NOT NULL',
			'tb_cp_vision_en VARCHAR(512) NOT NULL',
			'tb_cp_mision_en VARCHAR(512) NOT NULL',
			'tb_cp_value_en VARCHAR(512) NOT NULL',
			'tb_cp_objectives_en VARCHAR(512) NOT NULL'
		]);
	}

	public function down()
	{
		//
	}
}
