<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wali;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga = Sekolah::isLembaga();
        $data = [
            'pages' => 'Data Siswa',
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
            'siswa' => Siswa::orderBy('id', 'desc')
                ->where('sekolah_id', $lembaga->id)
                ->where('kelas_id', request('kelas'))
                ->paginate(10),
        ];
        return view('admin.siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lembaga = Sekolah::isLembaga();
        $data = [
            'pages' => 'Data Siswa',
            'lembaga' => $lembaga,
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
        ];
        return view('admin.siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'no_hp_wali' => 'required',
            'password' => 'required',
            'password_wali' => 'required',
        ]);

        $lembaga = Sekolah::isLembaga();
        $siswa = Siswa::create([
            'sekolah_id' => $lembaga->id,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas,
            'password' => bcrypt($request->password),
            'password_view' => $request->password,
        ]);

        Wali::create([
            'siswa_id' => $siswa->id,
            'nama_wali' => $request->nama_wali,
            'no_hp' => $request->no_hp_wali,
            'alamat' => $request->alamat_wali,
            'password' => bcrypt($request->password_wali),
            'password_view' => $request->password_wali,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa dan Wali Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::find($id);
        $wali = Wali::where('siswa_id', $id)->first();

        $data = [
            'pages' => 'Data Siswa',
            'siswa' => $siswa,
            'wali' => $wali,
        ];
        return view('admin.siswa.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lembaga = Sekolah::isLembaga();
        $siswa = Siswa::find($id);
        $wali = Wali::where('siswa_id', $id)->first();

        $data = [
            'pages' => 'Data Siswa',
            'lembaga' => $lembaga,
            'siswa' => $siswa,
            'wali' => $wali,
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
        ];
        return view('admin.siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'nama_wali' => 'required',
            'alamat_wali' => 'required',
            'no_hp_wali' => 'required',
            'password' => 'required',
            'password_wali' => 'required',
        ]);

        Siswa::find($id)->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas,
            'password' => bcrypt($request->password),
            'password_view' => $request->password,
        ]);

        Wali::find($request->id_wali)->update([
            'siswa_id' => $id,
            'nama_wali' => $request->nama_wali,
            'no_hp' => $request->no_hp_wali,
            'alamat' => $request->alamat_wali,
            'password' => bcrypt($request->password_wali),
            'password_view' => $request->password_wali,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa dan Wali Siswa berhasil diupdate.');
    }

     // function handle excel
     public function importExcel(Request $request)
     {
         $request->validate([
             'importExcel' => 'required|mimes:xlsx,xls,csv',
             'kelas' => 'required',
         ]);

         $lembaga = Sekolah::isLembaga();

         try {
             Excel::import(new SiswaImport($lembaga->id, $request->kelas), $request->file('importExcel'));
             return redirect('/admin/siswa')->with('success', 'Siswa berhasil diimport.');
         } catch (\Exception $e) {
             return redirect('/admin/siswa')->with('errorImportExcel', $e->getMessage());
         }

     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        $wali = Wali::where('siswa_id', $id)->first();
        if($wali) {
            $wali->delete();
        }
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa dan Wali Siswa berhasil dihapus.');
    }
}
