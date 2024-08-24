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
        $days = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'];

        foreach ($days as $day) {
            JamAbsen::create([
                'sekolah_id' => 1,
                'hari' => $day,
                'jam_masuk' => '07:00:00',
                'jam_terlambat' => '07:30:00',
            ]);
        }
    }
}
