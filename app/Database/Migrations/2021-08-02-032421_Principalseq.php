<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Principalseq extends Migration
{
	public function up()
	{
		$fields = [
			'seqno' => [
				'type' 			=> 'INT(2) NOT NULL',
			]
		];

		$this->forge->addColumn('md_principal', $fields);
	}

	public function down()
	{
		//
	}
}
