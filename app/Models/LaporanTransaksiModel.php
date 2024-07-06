<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanTransaksiModel extends Model
{
    protected $table = 'laporan_transaksi'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id_pelanggan'; // Sesuaikan dengan primary key Anda
    protected $allowedFields = ['nama', 'alamat', 'no_telepon', 'tanggal_penyerahan', 'tanggal_pengambilan', 'total_harga', 'status_pembayaran', 'status_pengambilan']; // Sesuaikan dengan kolom yang ingin Anda ambil

    // Tambahan method-model tambahan jika diperlukan
}
