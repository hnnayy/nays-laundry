<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => TRUE,
            ],
            'tanggal_penyerahan' => [
                'type' => 'DATE',
            ],
            'tanggal_pengambilan' => [
                'type' => 'DATE',
                'null' => TRUE,
            ],
            'total_harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => TRUE,
            ],
            'status_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['Belum Lunas', 'Lunas'],
                'default' => 'Belum Lunas',
            ],
            'status_pengambilan' => [
                'type' => 'ENUM',
                'constraint' => ['baru', 'proses', 'selesai', 'dibatalkan'],
                'default' => 'baru',
            ],
        ]);
        $this->forge->addKey('id_pelanggan', TRUE);
        $this->forge->createTable('laporan_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('laporan_transaksi');
    }
}
