<?php

namespace Database\Seeders;

use App\Models\Creation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Creation::insert([
            [
                'title' => 'Website',
                'description' => 'Web Desa',
                'image_path' => 'creation/webdesa.png',
                'divisi' => 'Website',
                'status' => 'approve',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile',
                'description' => 'Mobile App',
                'image_path' => 'creation/mobile.png',
                'divisi' => 'Mobile',
                'status' => 'approve',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Alat Berbasis IoT',
                'description' => 'Alat Berbasis Internet Of Things',
                'image_path' => 'creation/iot.jpeg',
                'divisi' => 'IoT',
                'status' => 'approve',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Design UI Aplikasi',
                'description' => 'Design UI Aplikasi',
                'image_path' => 'creation/ux.png',
                'divisi' => 'UIUX',
                'status' => 'approve',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Penerapan Algoritma',
                'description' => 'Penerapan Algoritma',
                'image_path' => 'creation/sc.png',
                'divisi' => 'SistemCerdas',
                'status' => 'approve',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
