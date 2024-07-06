<?php

namespace App\Controllers;

use App\Models\PelangganAllModel; // Import model PelangganModel

class AdvancedForm extends BaseController
{
    public function index(): string
    {
        return view('form_advanced.html');
    }

    // Di dalam App\Controllers\AdvancedForm

public function processForm()
{
    // Ambil data dari form
    $nama = $this->request->getPost('nama');
    $alamat = $this->request->getPost('alamat');
    $no_telepon = $this->request->getPost('no_telepon');

    // Validasi data
    if ($nama && $alamat && $no_telepon) {
        // Simpan data ke dalam database
        $pelangganModel = new PelangganAllModel();
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telepon' => $no_telepon
        ];
        
        if ($pelangganModel->insert($data)) {
            // Set pesan sukses untuk ditampilkan di view
            $data['success_message'] = "Data berhasil disimpan!";
        } else {
            $data['error_message'] = "Gagal menyimpan data.";
        }
    } else {
        $data['error_message'] = "Data tidak lengkap.";
    }

    // Tampilkan view dengan pesan yang sesuai
    return view('form_advanced.html', $data);
}
}
