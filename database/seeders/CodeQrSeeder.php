<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeQrSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('code_qr')->insert([
            [
                'id' => '1',
                'code_unique' => '3BAh8NI2u32nJmKoP02',
                'password' => bcrypt('1234'),
                'sekolah_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
