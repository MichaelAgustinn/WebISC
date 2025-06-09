<?php

namespace Database\Seeders;

use App\Models\CreationUser;
use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            FaqSeeder::class,
            CreationSeeder::class,
        ]);

        CreationUser::insert([
            ['user_id' => 1, 'creation_id' => 1],
            ['user_id' => 1, 'creation_id' => 2],
            ['user_id' => 2, 'creation_id' => 2],
            ['user_id' => 2, 'creation_id' => 3],
            ['user_id' => 3, 'creation_id' => 3],
            ['user_id' => 3, 'creation_id' => 4],
            ['user_id' => 4, 'creation_id' => 4],
            ['user_id' => 4, 'creation_id' => 5],
        ]);


        Profile::insert([
            [
                'user_id' => 1,
                'nim' => null,
                'angkatan' => null,
                'jabatan' => 'Developer',
                'divisi' => 'None',
                'foto' => 'photo_profil/pp.png',
            ],
            [
                'user_id' => 2,
                'nim' => 'D0223310',
                'angkatan' => '2023',
                'jabatan' => 'Ketua Tim Kreatif',
                'divisi' => 'Website',
                'foto' => 'photo_profil/miky.png',
            ],
            [
                'user_id' => 3,
                'nim' => null,
                'angkatan' => null,
                'jabatan' => null,
                'divisi' => 'None',
                'foto' => 'photo_profil/user.png',
            ],
            [
                'user_id' => 4,
                'nim' => 'D0223000',
                'angkatan' => '2022',
                'jabatan' => 'Ketua Umum',
                'divisi' => 'Sistem Cerdas',
                'foto' => 'photo_profil/ketua.png',
            ],
        ]);
    }
}
