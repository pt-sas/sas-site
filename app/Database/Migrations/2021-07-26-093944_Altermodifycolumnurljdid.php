<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Altermodifycolumnurljdid extends Migration
{
	public function up()
	{
		$fields = [
			'ur_jdid' => [
				'name'			=> 'url_jdid',
				'type'			=> 'VARCHAR',
				'constraint'	=> 256,
			],
		];
		$this->forge->modifyColumn('md_product', $fields);
	}

	public function down()
	{
		//
	}
}
