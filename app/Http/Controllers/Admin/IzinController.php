<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Izin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas_id = $request->input('kelas');
        $bulan = $request->input('bln');

        $query = Izin::query();

        if ($kelas_id) {
            $query->where('kelas_id', $kelas_id);
        }

        if ($bulan) {
            $query->whereYear('created_at', date('Y', strtotime($bulan)))->whereMonth('created_at', date('m', strtotime($bulan)));
        }

        $data = [
            'pages' => 'Data Perizinan',
            'perizinan' => $query->orderBy('id', 'desc')->paginate(10),
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
        ];

        return view('admin.perizinan.index', $data);
    }

    public function create()
    {
        $data = [
            'pages' => 'Data Perizinan',
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
        ];
        return view('admin.perizinan.create', $data);
    }

    public function getSiswa($id_kelas)
    {
        return response()->json([
            'success' => true,
            'siswa' => Siswa::where('kelas_id', $id_kelas)->get(),
        ]);
    }

    public function getAlasan($id)
    {
        return response()->json([
            'success' => true,
            'izin' => Izin::find($id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kelas' => 'required',
            'siswa' => 'required',
            'kategori' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'surat_keterangan' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048', // Tambah validasi file
        ]);

        // Proses upload file
        if ($request->hasFile('surat_keterangan')) {
            $fileName = Str::random(10) . '.' . $request->file('surat_keterangan')->getClientOriginalExtension();
            $request->file('surat_keterangan')->storeAs('perizinan', $fileName, 'public');
        }

        izin::create([
            'kelas_id' => $request->kelas,
            'siswa_id' => $request->siswa,
            'kategori' => $request->kategori,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'surat_keterangan' => $fileName,
            'status' => 'MENUNGGU',
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('perizinan.index')->with('success', 'Perizinan berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function getRejected(Request $request, string $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required',
        ]);

        Izin::whereId($id)->update([
            'alasan_penolakan' => $request->alasan_penolakan,
            'status' => 'DITOLAK',
        ]);

        return redirect()->back()->with('success', 'Perizinan berhasil ditolak.');
    }

    public function getApproved(Request $request, string $id)
    {
        Izin::whereId($id)->update([
            'status' => 'DISETUJUI',
        ]);

        return redirect()->back()->with('success', 'Perizinan berhasil disetujui.');
    }
}
