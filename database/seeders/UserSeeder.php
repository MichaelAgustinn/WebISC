<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'Admin',
                'nim' => null,
                'angkatan' => null,
                'jabatan' => 'Developer',
                'divisi' => 'None',
                'foto' => 'photo_profil/pp.png',
            ],
            [
                'name' => 'Miky',
                'email' => 'miky@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'Anggota',
                'nim' => 'D0223310',
                'angkatan' => '2023',
                'jabatan' => 'Ketua Tim Kreatif',
                'divisi' => 'Website',
                'foto' => 'photo_profil/miky.png',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'None',
                'nim' => null,
                'angkatan' => null,
                'jabatan' => null,
                'divisi' => 'None',
                'foto' => 'photo_profil/user.png',
            ],
            [
                'name' => 'Ketua',
                'email' => 'ketua@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
                'nim' => 'D0223000',
                'angkatan' => '2022',
                'jabatan' => 'Ketua Umum',
                'divisi' => 'Sistem Cerdas',
                'foto' => 'photo_profil/ketua.png',
            ]
        ]);
    }
}
