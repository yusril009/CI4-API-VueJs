<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_barang' => ['type' => 'varchar', 'constraint' => 50],
            'nama_barang' => ['type' => 'varchar', 'constraint' => 100, 'default' => null],
            'created_at' => ['type' => 'datetime', 'null' => true, 'on update' => 'NOW()'],
            'updated_at' => ['type' => 'datetime',  'null' => true, 'on update' => 'NOW()'],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_barang');
    }

    public function down()
    {
        //
    }
}