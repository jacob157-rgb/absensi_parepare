<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\JadwalPiketGuru;
use App\Models\JamKerja;
use App\Models\Sekolah;
use App\Models\Semester;
use Illuminate\Http\Request;

class JadwalPiketGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga = Sekolah::isLembaga();
        $jamKerja = JamKerja::where('sekolah_id', $lembaga->id)->get();
        $hariLibur = $jamKerja->pluck('hari_libur')->toArray();

        $data = [
            'pages' => 'Data jadwal piket',
            'guru' => Guru::all(),
            'jadwal_piket_guru' => JadwalPiketGuru::all(),
            'jam_kerja' => $jamKerja,
            'hari_libur' => $hariLibur, 
        ];

        return view('admin.jadwal_piket_guru.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'guru' => 'required',
        ]);

        $lembaga = Sekolah::isLembaga();

        $jamKerja = JamKerja::where('sekolah_id', $lembaga->id)->get();

        $hariLibur = $jamKerja->pluck('hari_libur')->toArray();

        if (in_array($request->hari, $hariLibur)) {
            return redirect()->back()->with('error', 'Jadwal pada hari libur tidak dapat dibuat.');
        }

        foreach ($request->guru as $guru) {
            JadwalPiketGuru::create([
                'hari' => $request->hari,
                'guru_id' => $guru,
            ]);
        }

        return redirect()->back()->with('success', 'Jadwal Piket Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->json([
            'success' => true,
            'edit' => Semester::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'semester' => 'required',
        ]);

        Semester::whereId($id)->update([
            'nama' => $request->semester,
        ]);

        return redirect()->back()->with('success', 'Semester berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $semester = Semester::whereId($id);
        $semester->delete();
        return redirect()->back()->with('success', 'Semester berhasil dihapus.');
    }
}
