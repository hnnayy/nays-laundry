<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $userModel->insertBatch([
            [
                'username' => 'admin',
                'password' => password_hash('adminpass', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'user',
                'password' => password_hash('userpass', PASSWORD_DEFAULT),
                'role'     => 'user',
            ],
        ]);
    }
}
