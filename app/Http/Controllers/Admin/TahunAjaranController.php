<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $data = [
            'pages' => 'Data Tahun Ajaran',
            'tahun_ajaran' => TahunAjaran::orderBy('id', 'desc')->paginate(10),
        ];
        return view('Admin.tahun_ajaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        TahunAjaran::create([
            'tahun' => $request->tahun,
        ]);

        return redirect()->back()->with('success', 'Tahun ajaran berhasil ditambah.');
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
            'edit' => TahunAjaran::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        TahunAjaran::whereId($id)->update([
            'tahun' => $request->tahun,
        ]);

        return redirect()->back()->with('success', 'Tahun ajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tahun = TahunAjaran::find($id);
        $tahun->delete();
        return redirect()->back()->with('success', 'Tahun ajaran berhasil dihapus.');
    }
}
