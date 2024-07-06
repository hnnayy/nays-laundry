<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table = 'form_layanan'; // Tetap menggunakan tabel ini untuk operasi model
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'pelanggan_id', // Menyesuaikan dengan kolom yang menyimpan ID pelanggan
        'jumlah_layanan',
        'jenis_layanan',
        'jumlah_kg',
        'total_harga_perlayanan',
        'total_harga_keseluruhan',
        'tanggal_penyerahan',
        'tanggal_pengambilan',
        'catatan_tambahan',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';

    protected $validationRules = [
        'pelanggan_id' => 'required', // Menyesuaikan dengan aturan validasi jika menggunakan ID pelanggan
        'jumlah_layanan' => 'required|numeric',
    ];

    protected $validationMessages = [
        'jumlah_layanan' => [
            'required' => 'Jumlah layanan harus diisi',
            'numeric' => 'Jumlah layanan harus berupa angka',
        ],
    ];

    protected $skipValidation = false;

    // Method untuk mendapatkan nama pelanggan
    public function getNamaPelanggan($id)
    {
        // Load model PelangganModel
        $pelangganModel = new PelangganModel();
        // Mengambil data nama dari pelanggan berdasarkan ID
        $namaPelanggan = $pelangganModel->find($id)['nama'];

        return $namaPelanggan;
    }
}
