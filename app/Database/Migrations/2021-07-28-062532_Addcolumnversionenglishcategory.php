<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnversionenglishcategory extends Migration
{
	public function up()
	{
		$fields = [
			'category_en' => [
				'type' 			=> 'VARCHAR (64) NOT NULL',
				'after'			=> 'category'
			]
		];

		$this->forge->addColumn('md_category', $fields);
	}

	public function down()
	{
		//
	}
}
