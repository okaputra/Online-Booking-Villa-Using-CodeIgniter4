<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Features extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'id_villa'          => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
			'features_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('Features', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Features');
    }
}
