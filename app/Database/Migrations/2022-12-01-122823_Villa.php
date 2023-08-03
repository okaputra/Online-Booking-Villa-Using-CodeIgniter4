<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Villa extends Migration
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
			'villa_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'description'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'rooms'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'beds'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'baths'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'square_feet'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'price'       => [
				'type'           => 'DECIMAL',
				'constraint'     => '15.2'
			],
			'thumbnail'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('Villas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Villas');
    }
}
