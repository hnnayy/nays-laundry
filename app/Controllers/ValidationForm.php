<?php

namespace App\Controllers;

use App\Models\PelangganAllModel;

class ValidationForm extends BaseController
{
    public function index()
    {
        // Load model 'PelangganAllModel'
        $pelangganModel = new PelangganAllModel();

        // Ambil data pelanggan dari model
        $data['pelanggan'] = $pelangganModel->findAll();

        // Kirim data ke view 'form_validation'
        return view('form_validation.html', $data);
    }

    public function processlayanan()
{
    // Menerima data dari permintaan POST
    $data = $this->request->getPost();

    // Validasi data jika diperlukan
    // Misalnya:
    // $validation = \Config\Services::validation();
    // $validation->setRules([...]);
    // if (!$validation->run($data)) {
    //     return $this->response->setStatusCode(400)->setJSON($validation->getErrors());
    // }

    // Ambil data pelanggan yang sesuai dengan nama yang diberikan
    $namaPelanggan = $data['nama']; // Asumsikan 'nama' adalah nama pelanggan yang dipilih
    $pelangganModel = new PelangganAllModel();
    $pelanggan = $pelangganModel->where('nama', $namaPelanggan)->first();

    if (!$pelanggan) {
        return $this->response->setStatusCode(404)->setJSON(['error' => 'Pelanggan tidak ditemukan']);
    }

    // Masukkan id pelanggan ke dalam data yang akan disimpan
    $data['id_pelanggan'] = $pelanggan['id_pelanggan'];

    // Hapus 'nama' dari data yang akan disimpan, karena kita sudah mendapatkan 'id_pelanggan'
    unset($data['nama']);

    // Proses data
    try {
        // Disini Anda dapat memanipulasi data atau menyimpannya ke database menggunakan model
        $pelangganModel = new PelangganAllModel();
        $pelangganModel->save($data);

        // Jika berhasil disimpan, Anda bisa memberikan respons sukses
        $success_message = 'Data berhasil disimpan!';
    } catch (\Exception $e) {
        // Tangani kesalahan
        $error_message = 'Gagal menyimpan data. Error: ' . $e->getMessage();
    }

    // Ambil data pelanggan dari model
    $data['pelanggan'] = $pelangganModel->findAll();

    // Kirim data ke view 'form_validation' bersama dengan pesan-pesan sukses dan error
    return view('form_validation.html', [
        'pelanggan' => $data['pelanggan'],
        'success_message' => $success_message ?? null,
        'error_message' => $error_message ?? null
    ]);
}
}