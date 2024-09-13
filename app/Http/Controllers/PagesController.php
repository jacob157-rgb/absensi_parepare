<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Siswa;
use App\Models\CodeQR;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PagesController extends Controller
{
    //CONTROLLER CODE QR
    public function code_qr()
    {
        $qrCodeAuthenticated = Session::get('sekolah_id');
        if (!$qrCodeAuthenticated) {
            return redirect('/auth/code_qr');
        }

        $lembaga = CodeQR::where('sekolah_id', $qrCodeAuthenticated)->first();
        if (!$lembaga) {
            return redirect('/auth/code_qr')->with('error', 'Sekolah tidak ditemukan.');
        }
        $data = [
            'code_unique' => $lembaga->code_unique,
            'sekolah_id' => $qrCodeAuthenticated,
        ];

        $qrCode = QrCode::size(400)->generate(json_encode($data));
        $data = [
            'pages' => 'Code QR',
            'qrCode' => $qrCode,
            'lembaga' => $lembaga,
            'sekolah' => Sekolah::lembagaBy($qrCodeAuthenticated),
        ];
        return view('pages.qrcode.code_qr', $data);
    }

    public function codeqrIndex()
    {
        $qrCodeAuthenticated = Session::get('sekolah_id');
        if ($qrCodeAuthenticated == true) {
            return redirect('/code_qr');
        }
        $data = [
            'pages' => 'Code QR',
            'sekolah' => Sekolah::all(),
        ];
        return view('pages.qrcode.index', $data);
    }

    public function codeqrPost(Request $request)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|string',
            'sekolah_id' => 'required|string',
        ]);

        $codeQR = CodeQR::where('sekolah_id', $request->sekolah_id)->first();

        if (!$codeQR) {
            return redirect()->back()->with('error', 'QR code not found for this school');
        }

        if (!Hash::check($request->password, $codeQR->password)) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        Session::put('sekolah_id', $request->sekolah_id);
        return redirect('/code_qr');
    }

    public function postQrResponse(Request $request)
    {
        $qrCodeAuthenticated = Session::get('sekolah_id');
        $lembaga = CodeQR::where('sekolah_id', $qrCodeAuthenticated)->first();
        $lembaga->update([
            'code_unique' => $request->code_unique,
        ]);

        return response()->json(
            [
                'success' => true,
                'data' => $request->all(),
            ],
            201,
        );
    }
    //CONTROLLER MESIN

    public function mesin()
    {
        $qrCodeAuthenticated = Session::get('mesin');
        if (!$qrCodeAuthenticated) {
            return redirect('/auth/mesin');
        }

        $lembaga = Mesin::where('sekolah_id', $qrCodeAuthenticated)->first();

        $tanggalAbsen = now();
        $showAbsensi = Absensi::where('sekolah_id', $qrCodeAuthenticated)
            ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
            ->paginate(20);
        $data = [
            'pages' => 'Mesin',
            'sekolah' => Sekolah::lembagaBy($qrCodeAuthenticated),
            'lembaga' => $lembaga,
            'showAbsensi' => $showAbsensi,
        ];
        return view('pages.mesin.mesin', $data);
    }

    public function codeMesinIndex()
    {
        $qrCodeAuthenticated = Session::get('mesin');
        if ($qrCodeAuthenticated == true) {
            return redirect('/mesin');
        }
        $data = [
            'pages' => 'Mesin',
            'sekolah' => Sekolah::all(),
        ];
        return view('pages.mesin.index', $data);
    }
    public function codeMesinPost(Request $request)
    {

        // Validate the request
        $request->validate([
            'password' => 'required|string',
            'sekolah_id' => 'required|string',
        ]);


        $mesin = Mesin::where('sekolah_id', $request->sekolah_id)->first();

        if (!$mesin) {
            return redirect()->back()->with('error', 'Mesin not found for this school');
        }

        if (!Hash::check($request->password, $mesin->password)) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        Session::put('mesin', $request->sekolah_id);
        return redirect('/mesin');
    }

    public function storeAbsen(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'sekolah_id' => 'required',
        ]);

        $siswa = Siswa::where('nik', $request->nik)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
        }

        $tanggalAbsen = now();

        $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereDate('tanggal_absen', $tanggalAbsen->toDateString())
            ->exists();

        if ($existingAbsensi) {
            return redirect()->back()->with('error', 'Siswa sudah melakukan absensi hari ini.');
        }

        Absensi::create([
            'siswa_id' => $siswa->id,
            'sekolah_id' => $request->sekolah_id,
            'pengabsen' => 'UMUM',
            'tanggal_absen' => $tanggalAbsen,
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil absen.');
    }

    public function kehadiran(Request $request) {
        $tingkatKelas = Kelas::orderBy('tingkat_kelas', 'asc')->get(); 
        $data = [
            'tingkatKelas' => $tingkatKelas
        ];
        return view('pages.kehadiran.index', $data);
    }
}
