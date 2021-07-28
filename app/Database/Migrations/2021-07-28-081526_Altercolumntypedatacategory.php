<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Altercolumntypedatacategory extends Migration
{
	public function up()
	{
		$fields = [
			'category1'	=> ['type' => 'INT (5) NOT NULL'],
			'category2'	=> ['type' => 'INT (5) NOT NULL'],
			'category3'	=> ['type' => 'INT (5) NOT NULL']
		];

		$this->forge->modifyColumn('md_productcategory', $fields);
	}

	public function down()
	{
		//
	}
}
