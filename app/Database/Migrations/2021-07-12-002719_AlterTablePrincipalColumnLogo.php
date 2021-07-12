<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTablePrincipalColumnLogo extends Migration
{
	public function up()
	{
		$fields = [
			'logo' => [
				'name'			=> 'md_image_id',
				'type'			=> 'INT',
				'constraint'	=> 5,
			],
		];
		$this->forge->modifyColumn('md_principal', $fields);
	}

	public function down()
	{
		//
	}
}
