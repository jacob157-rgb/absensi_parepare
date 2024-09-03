<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal_piket_guru')->insert([
            [
                'guru_id' => 1,
                'hari' => 'SENIN',
            ],
            [
                'guru_id' => 1,
                'hari' => 'SELASA',
            ],
            [
                'guru_id' => 1,
                'hari' => 'RABU',
            ],
            [
                'guru_id' => 1,
                'hari' => 'KAMIS',
            ],
            [
                'guru_id' => 1,
                'hari' => 'JUMAT',
            ],
        ]);
    }
}
