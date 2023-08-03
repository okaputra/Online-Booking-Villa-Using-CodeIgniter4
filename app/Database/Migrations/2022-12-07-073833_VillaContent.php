<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VillaContent extends Migration
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
			'image_1'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'image_2'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'image_3'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'image_4'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'image_5'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'link_maps'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '900'
			],
			'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
			'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('VillaContent', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('VillaContent');
    }
}
