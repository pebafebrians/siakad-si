<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Admin Utama',
                'email'    => 'admin@example.com',
                'password' => 'password',
                'role'     => 'admin',
            ],
            [
                'name'     => 'Dosen Pengampu',
                'email'    => 'dosen@example.com',
                'password' => 'password',
                'role'     => 'dosen',
            ],
            [
                'name'     => 'Dosen Wali',
                'email'    => 'dosenwali@example.com',
                'password' => 'password',
                'role'     => 'dosen_wali',
            ],
            [
                'name'     => 'Mahasiswa Contoh',
                'email'    => 'mahasiswa@example.com',
                'password' => 'password',
                'role'     => 'mahasiswa',
            ],
            [
                'name'     => 'Bendahara Kampus',
                'email'    => 'bendahara@example.com',
                'password' => 'password',
                'role'     => 'bendahara',
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'     => $data['name'],
                    'password' => Hash::make($data['password']),
                    'role'     => $data['role'],
                ]
            );
        }

        $this->command->info('5 user default berhasil dibuat (password: password)');
    }
}
