<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnurllazada extends Migration
{
	protected $DBGroup = 'default';

	public function up()
	{
		$fields = [
			'url_lazada'       => [
				'type'          => 'VARCHAR',
				'after'         => 'url_jdid',
				'constraint'    => 256,
				'null'          => true
			]
		];

		$this->forge->addColumn('md_product', $fields);
	}

	public function down()
	{
		$fields = ['url_lazada'];
		$this->forge->dropColumn('md_product', $fields);
	}
}
