<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
	public function up()
	{
		$this->forge->addColumn('trx_news', [
			'title_en VARCHAR(60) NOT NULL',
			'content_en TEXT NOT NULL',
		]);
	}

	public function down()
	{
		//
	}
}
