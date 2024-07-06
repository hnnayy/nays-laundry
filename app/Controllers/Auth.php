<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function logout()
    {
        // Lakukan proses logout, misalnya dengan menghancurkan session
        session()->destroy();

        // Redirect ke halaman home
        return redirect()->to('/');
    }
}
