<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'code' => strtoupper(Str::random(5)),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('votings')->insert($data);
    }
}
