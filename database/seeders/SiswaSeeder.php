<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'sekolah_id' => 1,
                'kelas_id' => 1,
                'nisn' => 1234,
                'nik' => 1234,
                'nama' => 'Siswa 1',
                'tempat_lahir' => 'disini',
                'tanggal_lahir' => '2008-01-01',
                'jenis_kelamin' => 'LAKI-LAKI',
                'password' => bcrypt('1234'),
                'password_view' => '1234'
            ],
            [
                'sekolah_id' => 1,
                'kelas_id' => 2,
                'nisn' => 123,
                'nik' => 123,
                'nama' => 'Siswa 2',
                'tempat_lahir' => 'disono',
                'tanggal_lahir' => '2008-02-02',
                'jenis_kelamin' => 'PEREMPUAN',
                'password' => bcrypt('123'),
                'password_view' => '123'
            ]
        ]);
    }
}
