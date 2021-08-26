<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnurljob extends Migration
{
	public function up()
	{
		$fields = [
			'url1' => [
				'type' 			=> 'VARCHAR (256) NOT NULL',
				'after'			=> 'url'
			],
			'url2' => [
				'type' 			=> 'VARCHAR (256) NOT NULL'
			]
		];

		$this->forge->addColumn('trx_job', $fields);

		$fields2 = [
			'description_en' => [
				'type'			=> 'TEXT',
				'after'			=> 'description'
			],
			'requirement_en' => [
				'type'			=> 'TEXT',
				'after'			=> 'requirement'
			],
			'level' => [
				'type'			=> 'CHAR (2) NOT NULL',
				'after'			=> 'expired_date'
			]
		];

		$this->forge->modifyColumn('trx_job', $fields2);
	}

	public function down()
	{
		//
	}
}
