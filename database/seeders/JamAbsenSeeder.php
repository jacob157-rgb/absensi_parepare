<?php

namespace Database\Seeders;

use App\Models\JamAbsen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JamAbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU'];

        foreach ($days as $day) {
            if ($day == 'MINGGU') {
                JamAbsen::create([
                    'sekolah_id' => 1,
                    'hari' => $day,
                    'jam_masuk' => '00:00:00',
                    'jam_terlambat' => '00:00:00',
                ]);
            } else {
                JamAbsen::create([
                    'sekolah_id' => 1,
                    'hari' => $day,
                    'jam_masuk' => '07:00:00',
                    'jam_terlambat' => '07:30:00',
                ]);
            }
        }
    }
}
