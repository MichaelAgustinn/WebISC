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

            ],
            [
                'name' => 'Miky',
                'email' => 'miky@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'Anggota',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'None',
            ],
            [
                'name' => 'Ketua',
                'email' => 'ketua@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],
            [
                'name' => 'Sugirato Cokrowibowo',
                'email' => 'sugiratocokrowibowo@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],
            [
                'name' => 'Muh. Fahmi Rustan',
                'email' => 'fahmi@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],
            [
                'name' => 'Rafly Rasyid',
                'email' => 'rafly@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],
            [
                'name' => 'Nuralamsah Zulkarnaim',
                'email' => 'nuralamsah@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],
            [
                'name' => 'Farid Wajidi',
                'email' => 'farid@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],
            [
                'name' => 'Wawan Firgiawan',
                'email' => 'wawan@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],

            [
                'name' => 'Andi Amirul Asnan Cirua',
                'email' => 'amirul@example.com',
                'password' => bcrypt('1234'),
                'role' => 'Pengurus',
            ],


        ]);
    }
}
