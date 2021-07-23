<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
{
	public function up()
	{
		$this->forge->addColumn('trx_promo', [
			'title_en VARCHAR(60) NOT NULL',
			'content_en TEXT NOT NULL',
		]);
	}

	public function down()
	{
		//
	}
}
