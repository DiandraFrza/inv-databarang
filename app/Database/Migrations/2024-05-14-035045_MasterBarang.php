<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'merk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'sn' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tgl_pembelian' => [
                'type'       => 'DATE',
            ],
            'tgl_kalibarasi' => [
                'type'       => 'DATE',
                'null'      => true,
            ],
            'kondisi_alat' => [
                'type'       => 'VARCHAR',
                'constraint'      => '255',
            ],
            'lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('master_barang');
    }

    public function down()
    {
        $this->forge->dropTable('master_barang');
    }
}