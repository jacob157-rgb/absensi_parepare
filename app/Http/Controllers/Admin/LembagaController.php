<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Sekolah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = metaData();
        if ($roles['roles'] == 'MASTER') {
            $data = [
                'pages' => 'Data Lembaga',
                'lembaga' => Sekolah::orderBy('id', 'desc')->paginate(10),
            ];
            return view('admin.lembaga.index', $data);
        } else {
            $lembaga = Sekolah::isLembaga();
            $data = [
                'pages' => Str::upper('Informasi '. $lembaga->nama),
                'lembaga' => $lembaga,
            ];
            return view('admin.lembaga.show_by_lembaga', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'pages' => 'Data Lembaga',
        ];
        return view('admin.lembaga.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instansi' => 'required|string',
            'sub_instansi' => 'required|string',
            'nama' => 'required|string',
            'level' => 'required|in:TK/RA,SD/MI,SMP/MTS,SMA/MA',
            'PERGURUAN TINGGI',
            'status' => 'required|in:ACTIVE,NON ACTIVE',
            'nsm' => 'required|string|max:12',
            'npsn' => 'required|string|max:8',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'nullable|string',
            'alamat' => 'required|string',
            'tempat_cetak' => 'required|string',
            'no_telp' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        Sekolah::create([
            'instansi' => $request->instansi,
            'sub_instansi' => $request->sub_instansi,
            'nama' => $request->nama,
            'level' => $request->level,
            'status' => $request->status,
            'nsm' => $request->nsm,
            'npsn' => $request->npsn,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tempat_cetak' => $request->tempat_cetak,
        ]);

        Admin::create([
            'nama' => 'Admin',
            'username' => $request->nsm,
            'password' => bcrypt('1234'),
            'roles' => 'LEMBAGA',
        ]);

        return redirect('/admin/lembaga')->with('success', 'Data lembaga berhasil didaftarkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'pages' => 'Data Lembaga',
            'lembaga' => Sekolah::find($id),
        ];
        return view('admin.lembaga.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'pages' => 'Data Lembaga',
            'edit' => Sekolah::find($id),
        ];
        return view('admin.lembaga.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'instansi' => 'required|string',
            'sub_instansi' => 'required|string',
            'nama' => 'required|string',
            'level' => 'required|in:TK/RA,SD/MI,SMP/MTS,SMA/MA',
            'PERGURUAN TINGGI',
            'status' => 'required|in:ACTIVE,NON ACTIVE',
            'nsm' => 'required|string|max:12',
            'npsn' => 'required|string|max:8',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'kecamatan' => 'nullable|string',
            'kelurahan' => 'nullable|string',
            'alamat' => 'required|string',
            'tempat_cetak' => 'required|string',
            'no_telp' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        $lembaga = Sekolah::find($id);

        $lembaga->update([
            'instansi' => $request->instansi,
            'sub_instansi' => $request->sub_instansi,
            'nama' => $request->nama,
            'level' => $request->level,
            'status' => $request->status,
            'nsm' => $request->nsm,
            'npsn' => $request->npsn,
            'provinsi' => $request->provinsi ?? $lembaga->provinsi,
            'kabupaten' => $request->kabupaten ?? $lembaga->kabupaten,
            'kecamatan' => $request->kecamatan ?? $lembaga->kecamatan,
            'kelurahan' => $request->kelurahan ?? $lembaga->kelurahan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tempat_cetak' => $request->tempat_cetak,
        ]);

        return redirect('/admin/lembaga')->with('success', 'Data lembaga berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lembaga = Sekolah::find($id);
        $account = Admin::where('username', $lembaga->nsm)->first();
        $lembaga->delete();
        $account->delete();
        return redirect('/admin/lembaga')->with('success', 'Data lembaga berhasil dihapus');
    }
}
