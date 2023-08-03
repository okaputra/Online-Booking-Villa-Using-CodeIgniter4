<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
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
			'id_villa'       => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
			'id_user'       => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
			'start_date'       => [
				'type'           => 'DATE'
			],
			'end_date'       => [
				'type'           => 'DATE',
			],
			'duration'       => [
				'type'           => 'INT',
				'constraint'     => 100,
			],
			'price'       => [
				'type'           => 'DECIMAL',
				'constraint'     => '15.2'
			],
			'total_price'       => [
				'type'           => 'DECIMAL',
				'constraint'     => '15.2'
			],
			'status'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
            ],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('Booking', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Booking');
    }
}
