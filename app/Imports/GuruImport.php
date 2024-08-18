<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    protected $sekolah_id;

    public function __construct($sekolah_id)
    {
        $this->sekolah_id = $sekolah_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $messages = [
            'nik_nip.required' => 'NIK ada yang belum diisi',
            'nama.required' => 'Nama ada yang belum diisi',
            'password.required' => 'Password ada yang belum diisi',
        ];

        Validator::make(
            $row,
            [
                'nik_nip' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'password' => 'required|string',
            ],
            $messages,
        )->validate();

        $data = [
            'nik_nip' => $row['nik_nip'],
            'nama' => $row['nama'],
            'password' => Hash::make($row['password']),
            'password_view' => $row['password'],
            'sekolah_id' => $this->sekolah_id,
        ];

        $existingGuru = Guru::where('nik_nip', $row['nik_nip'])->first();

        if ($existingGuru) {
            $existingGuru->update($data);
            Log::info('Tes Debug :', ['nik_nip' => $row['nik_nip']]);
            return null;
        }
        return new Guru($data);
    }
}
