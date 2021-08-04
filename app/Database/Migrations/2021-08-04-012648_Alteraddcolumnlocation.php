<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alteraddcolumnlocation extends Migration
{
	public function up()
	{
		$fields = [
			'name_en'	=> [
				'type' 			=> 'VARCHAR (64) NOT NULL',
				'after'			=> 'name'
			]
		];

		$fields2 = [
			'name'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '64'
			]
		];

		$this->forge->addColumn('md_location', $fields);
		$this->forge->modifyColumn('md_location', $fields2);
	}

	public function down()
	{
	}
}
