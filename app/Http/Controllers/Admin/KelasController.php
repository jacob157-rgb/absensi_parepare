<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pages' => 'Data Kelas',
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->paginate(15),
        ];
        return view('admin.kelas.index', $data);
    }
    public function create(Request $request)
    {
        $data = [
            'pages' => 'Data Kelas',
        ];
        return view('admin.kelas.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'tingkat_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'urusan_kelas' => 'required|string|max:255',
            'kelompok' => 'nullable',
            'live' => 'nullable',
        ]);
        $kelas = new Kelas();
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->urusan_kelas = $request->urusan_kelas;
        $kelas->kelompok = $request->kelompok;
        $kelas->live = $request->live;
        $kelas->save();
        return redirect('/admin/kelas')->with('success', 'Kelas berhasil ditambahkan');
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'pages' => 'Kelas',
            'kelas' => Kelas::find($id),
        ];
        return view('admin.kelas.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tingkat_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'urusan_kelas' => 'required|string|max:255',
            'kelompok' => 'nullable',
            'live' => 'nullable',
        ]);
        $kelas = Kelas::find($id);
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->urusan_kelas = $request->urusan_kelas;
        $kelas->kelompok = $request->kelompok;
        $kelas->live = $request->live;
        $kelas->save();
        return redirect('/admin/kelas')->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->back()->with('success', 'Kelas berhasil dihapus');
    }
}
