<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArtikelTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul' => ['type' => 'VARCHAR', 'constraint' => 255],
            'kategori_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'penulis' => ['type' => 'VARCHAR', 'constraint' => 100],
            'isi' => ['type' => 'TEXT'],
            'gambar' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'tanggal_publikasi' => ['type' => 'DATE'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('artikel');
    }

    public function down()
    {
        $this->forge->dropTable('artikel');
    }
}
