<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'sekolah_id' => 1,
                'nama' => 'Guru 1',
                'nik_nip' => '1234',
                'password' => bcrypt('1234'),
                'password_view' => '1234'
            ],
            [
                'sekolah_id' => 2,
                'nama' => 'Guru 2',
                'nik_nip' => '123',
                'password' => bcrypt('123'),
                'password_view' => '123'
            ]
        ]);
    }
}
