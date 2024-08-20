<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Wali;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    protected $sekolah_id;
    protected $kelas_id;

    public function __construct($sekolah_id, $kelas_id)
    {
        $this->sekolah_id = $sekolah_id;
        $this->kelas_id = $kelas_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        $messages = [
            'nama.required' => 'Nama ada yang belum diisi',
            'nisn.required' => 'NISN ada yang belum diisi',
            'nik.required' => 'NIK ada yang belum diisi',
            'tempat_lahir.required' => 'Tempat lahir ada yang belum diisi',
            'tanggal_lahir.required' => 'Tanggal lahir ada yang belum diisi',
            'tanggal_lahir.date_format' => 'Tanggal lahir harus berformat YYYY-MM-DD',
            'jenis_kelamin.required' => 'Jenis kelamin ada yang belum diisi',
            'nama_wali.required' => 'Nama wali ada yang belum diisi',
            'alamat_wali.required' => 'Alamat wali ada yang belum diisi',
            'no_hp_wali.required' => 'Nomor HP wali ada yang belum diisi',
            'password.required' => 'Password ada yang belum diisi',
            'password_wali.required' => 'Password wali ada yang belum diisi',
        ];

        // Validate the row data
        Validator::make(
            $row,
            [
                'nama' => 'required',
                'nisn' => 'required',
                'nik' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date_format:Y-m-d',
                'jenis_kelamin' => 'required',
                'nama_wali' => 'required',
                'alamat_wali' => 'required',
                'no_hp_wali' => 'required',
                'password' => 'required',
                'password_wali' => 'required',
            ],
            $messages
        )->validate();

        $siswaData = [
            'sekolah_id' => $this->sekolah_id,
            'kelas_id' => $this->kelas_id,
            'nisn' => $row['nisn'],
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'password' => Hash::make($row['password']),
            'password_view' => $row['password'],
        ];


        // Check if Siswa already exists
        $existingSiswa = Siswa::where('nisn', $row['nisn'])->orWhere('nik', $row['nik'])->first();

        if ($existingSiswa) {
            // Update existing Siswa record
            $existingSiswa->update($siswaData);
            Log::info('Siswa updated:', ['nisn' => $row['nisn']]);
            return null;
        } else {
            // Create a new Siswa record
            $siswa = Siswa::create($siswaData);

            // Create or update Wali record
            $waliData = [
                'siswa_id' => $siswa->id,
                'nama_wali' => $row['nama_wali'],
                'no_hp' => $row['no_hp_wali'],
                'alamat' => $row['alamat_wali'],
                'password' => Hash::make($row['password_wali']),
                'password_view' => $row['password_wali'],
            ];

            $existingWali = Wali::where('no_hp', $row['no_hp_wali'])->first();

            if ($existingWali) {
                $existingWali->update($waliData);
                Log::info('Wali updated:', ['no_hp' => $row['no_hp_wali']]);
            } else {
                Wali::create($waliData);
                Log::info('Wali created:', ['no_hp' => $row['no_hp_wali']]);
            }

            return $siswa;
        }
    }
}
