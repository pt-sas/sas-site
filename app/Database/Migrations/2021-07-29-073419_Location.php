<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Location extends Migration
{
	public function up()
	{
		$fields = [
			'url' => [
				'type' 			=> 'TEXT NOT NULL',
			]
		];

		$this->forge->addColumn('md_location', $fields);
	}

	public function down()
	{
		//
	}
}
