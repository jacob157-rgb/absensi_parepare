<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JamKerja;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class JamKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'pages' => 'Data Jam Kerja',
            'jam_kerja' => JamKerja::orderBy('id', 'desc')->where('sekolah_id', $request->query('lembaga'))->paginate(10),
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return view('admin.jam_kerja.index', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'pages' => 'Data Jam Kerja',
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return view('admin.jam_kerja.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'lembaga' => 'required',
            'nama' => 'required',
            'hari_libur' => 'required|array',
            'hari_libur.*' => 'string',
        ]);

        foreach ($request->hari_libur as $hari) {
            JamKerja::create([
                'sekolah_id' => $request->lembaga,
                'nama' => $request->nama,
                'hari_libur' => $hari,
            ]);
        }

        return redirect()->route('jam_kerja.index')->with('success', 'Jam Kerja berhasil ditambahkan.');
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
        // Retrieve the JamKerja record by ID
        $jamKerja = JamKerja::find($id);

        // Check if the record exists
        if (!$jamKerja) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        // Prepare the data
        $data = [
            'pages' => 'Data Jam Kerja',
            'jam_kerja' => $jamKerja,
        ];

        // Return JSON response
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'hari_libur' => 'required',
        ]);
        $jam_kerja = JamKerja::find($id);

        $jam_kerja->update([
            'nama' => $request->nama,
            'hari_libur' => $request->hari_libur,
        ]);

        return redirect("/admin/jam_kerja?lembaga=$jam_kerja->sekolah_id")->with('success', 'Jam Kerja berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jam_kerja = JamKerja::whereId($id);
        $jam_kerja->delete();
        return redirect()->back()->with('success', 'Jam Kerja berhasil dihapus.');
    }
}
