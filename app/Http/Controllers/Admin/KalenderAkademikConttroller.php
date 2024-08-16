<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Models\KalenderAkademik;
use App\Http\Controllers\Controller;

class KalenderAkademikConttroller extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pages' => 'Data Kalender Akademik',
            'kalender_akademik' => KalenderAkademik::orderBy('id', 'desc')->where('sekolah_id', $request->query('lembaga'))->paginate(10),
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return view('admin.kalender_akademik.index', $data);
    }

    public function create(Request $request)
    {
        $data = [
            'pages' => 'Data Kalender Akademik',
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return view('admin.kalender_akademik.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'lembaga' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        KalenderAkademik::create([
            'sekolah_id' => $request->lembaga,
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kalender_akademik.index')->with('success', 'Kalender Akademik berhasil ditambahkan.');
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
        $data = [
            'pages' => 'Data Kalender Akademik',
            'kalender_akademik' => KalenderAkademik::find($id),
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return view('admin.kalender_akademik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        $kalender_akademik = KalenderAkademik::find($id);

        $kalender_akademik->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect("/admin/kalender_akademik?lembaga=$kalender_akademik->sekolah_id")->with('success', 'Kalender Akademik berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kalender_akademik = KalenderAkademik::whereId($id);
        $kalender_akademik->delete();
        return redirect()->back()->with('success', 'Kalender Akademik berhasil dihapus.');
    }
}
