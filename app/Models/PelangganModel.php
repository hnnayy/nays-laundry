<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'form_pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = [
        'nama', 
        'alamat', 
        'no_telepon', 
        'jumlah_layanan', 
        'jenis_layanan', 
        'jumlah_kg', 
        'total_harga_perlayanan', 
        'total_harga_keseluruhan', 
        'tanggal_penyerahan', 
        'tanggal_pengambilan', 
        'status_pesanan', 
        'catatan_tambahan'
    ];
}
