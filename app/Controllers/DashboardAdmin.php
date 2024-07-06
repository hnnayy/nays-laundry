<?php

namespace App\Controllers;

use App\Models\PelangganAllModel;

class DashboardAdmin extends BaseController
{
    public function index(): string
    {
        try {
            // Load model 'PelangganAllModel'
            $pelangganModel = new PelangganAllModel();

            // Menghitung jumlah total data di tabel 'pelanggan'
            $totalData = $pelangganModel->countAll();

            // Menampilkan total data
            $data['totalDataPelanggan'] = $totalData;

            // Mengambil data total harga keseluruhan dari tabel 'pelanggan'
            $dataPelanggan = $pelangganModel->findAll();

            // Inisialisasi total
            $totalHarga = 0;

            // Loop melalui setiap baris data dan tambahkan nilai kolom total_harga_keseluruhan ke total
            foreach ($dataPelanggan as $row) {
                $totalHarga += $row['total_harga_keseluruhan'];
            }

            // Menambahkan total harga ke dalam data yang akan dikirim ke view
            $data['totalHarga'] = $totalHarga;

            // Mengirim data ke view
            return view('welcome_message', $data);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return "Error: " . $e->getMessage();
        }
    }
}
