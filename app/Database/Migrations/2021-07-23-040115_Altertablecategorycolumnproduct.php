<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Altertablecategorycolumnproduct extends Migration
{
	public function up()
	{
		$fields = [
			'md_product_id' => [
				'name'			=> 'md_principal_id',
				'type'			=> 'INT',
				'constraint'	=> 5,
			],
		];
		$this->forge->modifyColumn('md_category', $fields);
	}

	public function down()
	{
		//
	}
}
