<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnurltiktok extends Migration
{
	protected $DBGroup = 'default';

	public function up()
	{
		$fields = [
			'url_tiktok'       	=> [
				'type'          => 'VARCHAR',
				'after'         => 'url_lazada',
				'constraint'    => 256,
				'null'          => false
			]
		];

		$this->forge->addColumn('md_product', $fields);
	}

	public function down()
	{
		$fields = ['url_tiktok'];
		$this->forge->dropColumn('md_product', $fields);
	}
}
