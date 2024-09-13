<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wali;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\Sekolah;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\JamAbsen;
use App\Models\JamKerja;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function absensi(Request $request)
    {
        $lembaga = Sekolah::isLembaga();
        $showAbsensi = Absensi::whereDate('tanggal_absen', $request->query('date'))->get();
        $data = [
            'pages' => 'Data Laporan Absensi',
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
            'absensi' => $showAbsensi,
            'siswa' => Siswa::orderBy('id', 'desc')
                ->where('sekolah_id', $lembaga->id)
                ->get(),
        ];
        return view('admin.laporan_absensi.index', $data);
    }
    public function peringkat(Request $request)
    {
        $lembaga = Sekolah::isLembaga();
        $bulan = $request->query('month');
        $kelasId = $request->query('kelas');

        if (!$bulan || !$kelasId) {
            return view('admin.laporan_absensi.peringkat', [
                'pages' => 'Data Laporan Absensi',
                'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
                'siswa' => [],
            ]);
        }

        $tanggalArray = explode('-', $bulan);
        $tahun = $tanggalArray[0];
        $bulan = $tanggalArray[1];

        $siswaList = Siswa::where('sekolah_id', $lembaga->id)
            ->where('kelas_id', $kelasId)
            ->get();

        $dataSiswa = [];

        foreach ($siswaList as $siswa) {
            $totalKehadiran = Absensi::where('siswa_id', $siswa->id)
                ->whereMonth('tanggal_absen', $bulan)
                ->whereYear('tanggal_absen', $tahun)
                ->count();

            $dataSiswa[] = [
                'nama' => $siswa->nama,
                'total_kehadiran' => $totalKehadiran,
            ];
        }

        usort($dataSiswa, function ($a, $b) {
            return $b['total_kehadiran'] <=> $a['total_kehadiran'];
        });

        $data = [
            'pages' => 'Data Laporan Absensi',
            'kelas' => Kelas::orderBy('tingkat_kelas', 'asc')->get(),
            'siswa' => $dataSiswa,
        ];

        return view('admin.laporan_absensi.peringkat', $data);
    }

    public function pertanggal(Request $request)
    {
        $lembaga = Sekolah::isLembaga();
        $tanggal = $request->query('date');
        $kelasId = $request->query('kelas');
        if (!$tanggal || !$kelasId) {
            return redirect()->back()->with('error', 'Belum diiisi');
        }
        $siswa = Siswa::where('sekolah_id', $lembaga->id)
            ->where('kelas_id', $kelasId)
            ->orderBy('id', 'desc')
            ->with('kelas')
            ->get();

        $showAbsensi = $siswa->map(function ($siswa) use ($tanggal) {
            $absensi = Absensi::where('siswa_id', $siswa->id)
                ->whereDate('tanggal_absen', $tanggal)
                ->first();

            $siswa->absensi = $absensi;
            return $siswa;
        });

        $hari = formatHari($tanggal);
        $jam_absensi = JamAbsen::where('sekolah_id', $lembaga->id)
            ->where('hari', $hari)
            ->first();

        $tanggalHariIni = Carbon::now();

        $data = [
            'pages' => 'Data Laporan Absensi',
            'siswaAbsensi' => $showAbsensi,
            'sekolah' => $lembaga,
            'jam_absensi' => $jam_absensi,
            'date' => $tanggalHariIni->isoFormat('D MMMM YYYY'),
        ];

        return view('admin.laporan_absensi.pdf.pertanggal', $data);
    }
    public function persiswa(Request $request)
    {
        $lembaga = Sekolah::isLembaga();
        $bulan = $request->query('month');
        $kelasId = $request->query('kelas');
        $siswaId = $request->query('siswa');

        if (!$bulan || !$kelasId || !$siswaId) {
            return redirect()->back()->with('error', 'Belum diiisi');
        }
        $tanggalArray = explode('-', $bulan);
        $tahun = $tanggalArray[0];
        $bulan = $tanggalArray[1];

        $siswa = Siswa::where('id', $siswaId)->with('kelas')->first();
        $jam_absen = JamAbsen::where('sekolah_id', $siswa->sekolah_id)
            ->get()
            ->keyBy('hari');

        $existingAbsensi = Absensi::where('siswa_id', $siswa->id)
            ->whereMonth('tanggal_absen', $bulan)
            ->whereYear('tanggal_absen', $tahun)
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->tanggal_absen)->format('Y-m-d');
            });

        $startDate = Carbon::createFromDate($tahun, $bulan, 1);
        $endDate = $startDate->copy()->endOfMonth();

        $dates = [];
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dates[] = $date->toDateString();
        }

        $tanggalHariIni = Carbon::now();
        $bulanNama = Carbon::createFromDate(null, $bulan, 1)->isoFormat('MMMM');

        $data = [
            'pages' => 'Data Laporan Absensi Persiswa',
            'sekolah' => $lembaga,
            'date' => $tanggalHariIni->isoFormat('D MMMM YYYY'),
            'siswa' => $siswa,
            'bulan' => $bulanNama,
            'tahun' => $tahun,
            'existingAbsensi' => $existingAbsensi,
            'jam_absen' => $jam_absen,
            'dates' => $dates,
            'izin' => Izin::where('siswa_id', $siswaId)->whereMonth('tanggal_mulai', $bulan)->whereYear('tanggal_mulai', $tahun)->where('status', 'DISETUJUI')->get(),
        ];
        // dd($data);

        return view('admin.laporan_absensi.pdf.persiswa', $data);
    }

    public function perhari(Request $request)
    {
        $lembaga = Sekolah::isLembaga();
        $bulan = $request->query('month');
        $kelasId = $request->query('kelas');

        if (!$bulan || !$kelasId) {
            return redirect()->back()->with('error', 'Belum diiisi');
        }
        $tanggalArray = explode('-', $bulan);
        $tahun = $tanggalArray[0];
        $bulan = $tanggalArray[1];
        $tanggalHariIni = Carbon::now();
        $bulanNama = Carbon::createFromDate(null, $bulan, 1)->isoFormat('MMMM');
        $data = [
            'pages' => 'Data Laporan Absensi Persiswa',
            'sekolah' => $lembaga,
            'date' => $tanggalHariIni->isoFormat('D MMMM YYYY'),
            'bulan' => $bulanNama,
            'tahun' => $tahun,
            'siswa' => Siswa::where('kelas_id', $kelasId)->get(),
            'kelas' => Kelas::find($kelasId),
        ];

        // dd($data);
        return view('admin.laporan_absensi.pdf.perhari', $data);
    }
}
