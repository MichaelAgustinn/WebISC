<?php

namespace Database\Seeders;

use App\Models\CreationUser;
use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            VotingSeeder::class,
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
            [
                'user_id' => 5,
                'nim' => '12901482',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Sistem Cerdas',
                'foto' => 'photo_profil/paksugi.jpg',
            ],
            [
                'user_id' => 6,
                'nim' => '234657521',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Internet Of Things',
                'foto' => 'photo_profil/pakfahmi.jpg',
            ],
            [
                'user_id' => 7,
                'nim' => '43567643',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Mobile',
                'foto' => 'photo_profil/pakrafly.jpg',
            ],
            [
                'user_id' => 8,
                'nim' => '123456754',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Website',
                'foto' => 'photo_profil/pakalam.jpg',
            ],
            [
                'user_id' => 9,
                'nim' => '12435431',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Sistem Cerdas',
                'foto' => 'photo_profil/pakfarid.jpg',
            ],
            [
                'user_id' => 10,
                'nim' => '123456721',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Sistem Cerdas',
                'foto' => 'photo_profil/kakwawan.jpg',
            ],
            [
                'user_id' => 11,
                'nim' => '12323465',
                'angkatan' => '2000',
                'jabatan' => 'Pembimbing',
                'divisi' => 'Internet Of Things',
                'foto' => 'photo_profil/lortt.png',
            ],
        ]);

        DB::table('landing_page_contents')->insert([
            [
                'section' => 'hero',
                'judul' => 'Informatics Study Club',
                'content' => 'Satu-satunya wadah yang fokus untuk meningkatkan Skill Mahasiswa Teknik Informatika Prodi Informatika Unsulbar',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'about',
                'judul' => 'Belajar, Berkembang, dan Berkontribusi di ISC',
                'content' => 'ISC adalah wadah mahasiswa untuk mengembangkan keterampilan di bidang teknologi informasi melalui lima divisi: Mobile, Web, UI/UX, IoT, dan Sistem Cerdas. Didukung oleh Tim Kreatif dan Tim Marketing, ISC mendorong kolaborasi, eksplorasi, dan kontribusi nyata dalam dunia digital.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'visi',
                'judul' => 'Visi Informatics Study Club',
                'content' => 'Menjadi tempat utama pengembangan talenta digital mahasiswa yang inovatif, kolaboratif, dan berdaya saing di era teknologi.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'misi',
                'judul' => 'Misi Informatics Study Club',
                'content' => 'Menyediakan tempat belajar dan berkarya di bidang teknologi melalui lima divisi utama dan dua tim pendukung guna meningkatkan keterampilan serta kolaborasi mahasiswa.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'section' => 'tujuan',
                'judul' => 'Tujuan Informatics Study Club',
                'content' => 'Menghasilkan anggota - anggota yang kompeten dan mampu menciptakan solusi teknologi yang bermanfaat bagi kampus dan masyarakat.',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('testimonials')->insert([
            [
                'user_id' => 1,
                'rating' => 5,
                'message' => 'Luar biasa! Sebagai mahasiswa baru, saya merasa sangat terbantu dengan bimbingan dari Informatics Study Club. Materi yang dibagikan mudah dipahami dan pembimbingnya sangat ramah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'rating' => 4,
                'message' => 'ISC bukan cuma tempat belajar, tapi juga tempat bertemu teman-teman yang satu visi. Suasananya positif, dan kita didorong untuk terus berkembang, baik dalam teknis maupun soft skill.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'rating' => 5,
                'message' => 'Sejak ikut Informatics Study Club, skill coding saya meningkat pesat. Saya jadi lebih percaya diri ikut lomba-lomba IT, bahkan beberapa kali menang!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'rating' => 4,
                'message' => 'Mentor-mentornya keren banget dan nggak pelit ilmu. Kegiatan mingguannya selalu seru dan bermanfaat, mulai dari workshop sampai sharing session dengan alumni.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'rating' => 5,
                'message' => 'Saya merasa ISC berkontribusi besar terhadap karier saya. Banyak ilmu praktis yang nggak diajarkan di kelas tapi saya pelajari di sini. Sangat direkomendasikan untuk mahasiswa informatika!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
