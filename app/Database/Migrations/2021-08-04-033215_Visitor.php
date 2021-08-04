<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visitor extends Migration
{
	public function up()
	{
		$this->forge->addField([
      'id' => [
        'type' => 'INT',
        'constraint' => 13,
        'auto_increment' => TRUE
      ],
    	'ipaddress' => [
	      'type' => 'VARCHAR',
	      'constraint' => 20,
	      'null'=>false,
      ],
      'browser' => [
	      'type' => 'VARCHAR',
	      'constraint' => 20,
	      'null'=>false,
      ],
      'platform' => [
	      'type' => 'VARCHAR',
	      'constraint' => 50,
	      'null'=>false,
      ],
      'time timestamp not null default current_timestamp',
      'created_at timestamp not null default current_timestamp',
      'updated_at timestamp not null default current_timestamp',
		]);

    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('sys_visit');
	}

	public function down()
	{
    $this->forge->dropTable('sys_visit');
	}
}
