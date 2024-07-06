<?php

namespace App\Controllers;

use App\Models\PelangganAllModel;
use CodeIgniter\Controller;

class TableDynamics extends Controller
{
    protected $db;

    public function __construct()
    {
        // Load database connection
        $this->db = db_connect();
    }

    public function index()
    {
        try {
            // Load model 'PelangganModel'
            $pelangganModel = new PelangganAllModel();

            // Mengambil data pelanggan
            $data['pelanggan'] = $pelangganModel->findAll();

            // Mengirim data ke view
            return view('tables_dynamic.html', $data);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return "Error: " . $e->getMessage();
        }
    }

    public function destroy($id_pelanggan)
    {
        try {
            // Load model 'PelangganModel'
            $pelangganModel = new PelangganAllModel();

            // Delete the record
            if ($pelangganModel->delete($id_pelanggan)) {
                $data['success_message'] = "Data berhasil dihapus!";
            } else {
                $data['error_message'] = "Gagal menghapus data.";
            }

            // Mengambil data pelanggan yang diperbarui
            $data['pelanggan'] = $pelangganModel->findAll();

            // Tampilkan view dengan pesan yang sesuai
            return view('tables_dynamic.html', $data);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return "Error: " . $e->getMessage();
        }
    }
}


