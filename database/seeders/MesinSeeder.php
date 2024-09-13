<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesinSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mesins')->insert([
            [
                'id' => '1',
                'password' => bcrypt('1234'),
                'sekolah_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
