<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'user1',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role'     => 'user'
            ],
            [
                'username' => 'user2',
                'password' => password_hash('user23', PASSWORD_DEFAULT),
                'role'     => 'supervisor'
            ],
        ];

        // Masukkan ke database
        $this->db->table('users')->insertBatch($data);
    }
}
