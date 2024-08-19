<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JamAbsen;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class JamAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga = Sekolah::isLembaga();
        $dayOrder = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'];

        $data = [
            'pages' => 'Data Jam Absen',
            'jam_absen' => JamAbsen::where('sekolah_id', $lembaga->id)
                ->orderByRaw("FIELD(hari, '" . implode("','", $dayOrder) . "')")
                ->get(),
        ];
        return view('admin.jam_absen.index', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'jam_absen' => 'required|array',
            'jam_absen.*.jam_masuk' => 'required|date_format:H:i',
            'jam_absen.*.jam_terlambat' => 'required|date_format:H:i',
        ]);

        foreach ($request->jam_absen as $id => $data) {
            $jamAbsen = JamAbsen::whereId($id)->first();

            if ($jamAbsen) {
                $jamAbsen->jam_masuk = $data['jam_masuk'];
                $jamAbsen->jam_terlambat = $data['jam_terlambat'];
                $jamAbsen->save();
            }
        }

        return redirect()->route('jam_absen.index')->with('success', 'Data jam absen berhasil diperbarui');
    }
}
