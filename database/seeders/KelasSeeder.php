<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'tingkat_kelas' => 'I',
                'jurusan' => 'IPA',
                'urusan_kelas' => '1',
                'kelompok' => 'A',
                'live' => 'https://youtu.be/HB8vftGxsIc?si=gUpXpnQL1HtbVBKg'
            ],
            [
                'tingkat_kelas' => 'I',
                'jurusan' => 'IPS',
                'urusan_kelas' => '1',
                'kelompok' => 'B',
                'live' => 'https://youtu.be/7Jm2Il2U-c0?si=oj_BpqO7RL7srgB6'
            ]
        ]);
    }
}
