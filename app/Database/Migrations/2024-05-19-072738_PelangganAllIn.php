<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PelangganAllIn extends Migration{

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
                'constraint' => 100, // Tidak perlu tanda kutip di constraint
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => TRUE,
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
            'status_pesanan' => [ // Mengubah nama kolom
                'type' => 'ENUM',
                'constraint' => ['Pesanan Dalam Proses', 'Pesanan Selesai', 'Pesanan Dibatalkan'], // Menggunakan ENUM untuk pilihan yang terbatas
                'default' => 'Pesanan Dalam Proses', // Opsional, sesuaikan dengan default yang Anda inginkan
            ],
            'catatan_tambahan' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
        ]);
        $this->forge->addKey('id_pelanggan', TRUE);
        $this->forge->createTable('pelanggan'); // Ubah penamaan tabel disini
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan'); // Ubah penamaan tabel disini
    }
}
