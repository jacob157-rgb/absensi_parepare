<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wali')->insert([
            [
                'siswa_id' => 1,
                'nama_wali' => 'Wali Siswa 1',
                'no_hp' => '0123',
                'alamat' => 'disini',
                'password' => bcrypt('0123'),
                'password_view' => '0123'
            ],
            [
                'siswa_id' => 2,
                'nama_wali' => 'Wali Siswa 2',
                'no_hp' => '01234',
                'alamat' => 'disini',
                'password' => bcrypt('01234'),
                'password_view' => '01234'
            ]
        ]);
    }
}
