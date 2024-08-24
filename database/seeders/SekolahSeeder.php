<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sekolah')->insert([
            [
                'id' => '1',
                'instansi' => 'Instansi A',
                'sub_instansi' => 'Sub Instansi A',
                'nama' => 'Sekolah A',
                'level' => 'SD/MI',
                'status' => 'ACTIVE',
                'nsm' => '1234',
                'npsn' => '12345678',
                'provinsi' => 'JAWA BARAT',
                'kabupaten' => 'KOTA BANDUNG',
                'kecamatan' => 'BANDUNG KIDUL',
                'kelurahan' => 'KUJANGSARI',
                'alamat' => 'Jl. Contoh No. 123',
                'no_telp' => '022-1234567',
                'latitude' => -6.9175,
                'longitude' => 107.6191,
                'logo_kanan' => null,
                'logo_kiri' => null,
                'nama_kamad' => null,
                'status_kamad' => null,
                'nip_kamad' => null,
                'tempat_cetak' => 'Tempat Cetak A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'instansi' => 'Instansi B',
                'sub_instansi' => 'Sub Instansi B',
                'nama' => 'Sekolah B',
                'level' => 'SMP/MTS',
                'status' => 'NON ACTIVE',
                'nsm' => '12345',
                'npsn' => '87654321',
                'provinsi' => 'JAWA TIMUR',
                'kabupaten' => 'KOTA SURABAYA',
                'kecamatan' => 'TEGALSARI',
                'kelurahan' => 'TEGALSARI',
                'alamat' => 'Jl. Contoh No. 456',
                'no_telp' => '031-7654321',
                'latitude' => -7.2504,
                'longitude' => 112.7688,
                'logo_kanan' => null,
                'logo_kiri' => null,
                'nama_kamad' => null,
                'status_kamad' => null,
                'nip_kamad' => null,
                'tempat_cetak' => 'Tempat Cetak B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
