<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $lembaga = Sekolah::isLembaga();
        $data = [
            'pages' => 'Data Guru',
            'guru' => Guru::orderBy('id', 'desc')
                ->where('sekolah_id', $lembaga->id)
                ->paginate(10),
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return view('admin.guru.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik_nip' => 'required',
            'password' => 'required',
        ]);

        $lembaga = Sekolah::isLembaga();
        Guru::create([
            'sekolah_id' => $lembaga->id,
            'nama' => $request->nama,
            'nik_nip' => $request->nik_nip,
            'password' => bcrypt($request->password),
            'password_view' => $request->password,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
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
            'pages' => 'Data Guru',
            'guru' => Guru::find($id),
            'lembaga' => Sekolah::orderBy('id', 'desc')->get(),
        ];
        return response()->json(
            [
                'success' => true,
                'data' => $data,
            ],
            200,
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik_nip' => 'required',
            'password' => 'required',
        ]);

        $lembaga = Sekolah::isLembaga();
        Guru::find($id)->update([
            'sekolah_id' => $lembaga->id,
            'nama' => $request->nama,
            'nik_nip' => $request->nik_nip,
            'password' => bcrypt($request->password),
            'password_view' => $request->password,
        ]);

        return redirect('/admin/guru')->with('success', 'Guru berhasil diupdate.');
    }

    // function handle excel
    public function importExcel(Request $request)
    {
        $request->validate([
            'importExcel' => 'required|mimes:xlsx,xls,csv',
        ]);

        $lembaga = Sekolah::isLembaga();

        try {
            Excel::import(new GuruImport($lembaga->id), $request->file('importExcel'));
            return redirect('/admin/guru')->with('success', 'Guru berhasil diimport.');
        } catch (\Exception $e) {
            return redirect('/admin/guru')->with('errorImportExcel', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::whereId($id);
        $guru->delete();
        return redirect()->back()->with('success', 'Guru berhasil dihapus.');
    }
}
