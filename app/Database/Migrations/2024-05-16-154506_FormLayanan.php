<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormLayanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jumlah_layanan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jenis_layanan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jumlah_kg' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total_harga_perlayanan' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'total_harga_keseluruhan' => [ // Mengubah nama kolom
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'tanggal_penyerahan' => [
                'type' => 'DATE', // Sesuaikan dengan kebutuhan Anda
            ],
            'tanggal_pengambilan' => [
                'type' => 'DATE', // Sesuaikan dengan kebutuhan Anda
            ],
            'catatan_tambahan' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
        ]);
        
        $this->forge->addKey('id', TRUE); // Menggunakan 'id' sebagai primary key
        $this->forge->createTable('form_layanan');
    }

    public function down()
    {
        $this->forge->dropTable('form_layanan');
    }
}
