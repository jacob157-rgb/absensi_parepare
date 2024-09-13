<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    static function getAbsen($siswa, $tanggal)
    {
        $bulanTahun = request()->query('month');
        $tanggalFull = $bulanTahun . '-' . str_pad($tanggal, 2, '0', STR_PAD_LEFT);
        $tanggalArray = explode('-', $bulanTahun);
        $tahun = $tanggalArray[0];
        $bulan = $tanggalArray[1];
        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalFull)->format('Y-m-d');

        $existingAbsensi = Absensi::where('siswa_id', $siswa)->whereDate('tanggal_absen', $formattedDate)->first();

        $izins = Izin::whereMonth('tanggal_mulai', $bulan)->whereYear('tanggal_mulai', $tahun)->where('siswa_id', $siswa)->where('status', 'DISETUJUI')->get();

        $isIzin = false;
        foreach ($izins as $izin) {
            $tanggalMulai = \Carbon\Carbon::parse($izin->tanggal_mulai);
            $tanggalSelesai = \Carbon\Carbon::parse($izin->tanggal_selesai);

            if ($tanggalMulai->lessThanOrEqualTo($formattedDate) && $tanggalSelesai->greaterThanOrEqualTo($formattedDate)) {
                $isIzin = true;
                break;
            }
        }

        $lembaga = Sekolah::isLembaga();
        $jamkerja = JamKerja::where('sekolah_id', $lembaga->sekolah_id)
            ->where('hari_libur', Str::upper(formatHari($formattedDate)))
            ->exists();
        $kalenderAkademik = KalenderAkademik::where('sekolah_id', $lembaga->sekolah_id)
            ->where('tanggal', $formattedDate)
            ->exists();
        if ($isIzin) {
            $result = [
                'status' => 2,
                'text' => 'I',
                'date' => Str::upper(formatHari($formattedDate)),
                'status_jam_kerja' => $jamkerja,
                'status_libur_akademik' => $kalenderAkademik,
            ];
        } elseif ($existingAbsensi) {
            $result = [
                'status' => 1,
                'text' => '&#x2713;',
                'date' => Str::upper(formatHari($formattedDate)),
                'status_jam_kerja' => $jamkerja,
                'status_libur_akademik' => $kalenderAkademik,
            ];
        } else {
            $result = [
                'status' => 0,
                'text' => 'TH',
                'date' => Str::upper(formatHari($formattedDate)),
                'status_jam_kerja' => $jamkerja,
                'status_libur_akademik' => $kalenderAkademik,
            ];
        }

        return $result;
    }

    static function getAbsenBySiswa($siswa, $tanggal)
    {
        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggal);

        $existingAbsensi = Absensi::where('siswa_id', $siswa)->whereDate('tanggal_absen', $formattedDate)->first();

        $izins = Izin::where('siswa_id', $siswa)
            ->where('status', 'DISETUJUI')
            ->where(function ($query) use ($formattedDate) {
                $query->whereDate('tanggal_mulai', '<=', $formattedDate)->whereDate('tanggal_selesai', '>=', $formattedDate);
            })
            ->get();

        $isIzin = $izins->isNotEmpty();

        $lembaga = Siswa::find($siswa);
        $jamkerja = JamKerja::where('sekolah_id', $lembaga->sekolah_id)
            ->where('hari_libur', Str::upper(formatHari($formattedDate)))
            ->exists();
        $kalenderAkademik = KalenderAkademik::where('sekolah_id', $lembaga->sekolah_id)
            ->where('tanggal', $formattedDate->format('Y-m-d'))
            ->exists();

        if ($isIzin) {
            $result = [
                'status' => 2,
                'text' => 'I',
                'date' => Str::upper(formatHari($formattedDate)),
                'status_jam_kerja' => $jamkerja,
                'status_libur_akademik' => $kalenderAkademik,
            ];
        } elseif ($existingAbsensi) {
            $result = [
                'status' => 1,
                'text' => '&#x2713;',
                'date' => Str::upper(formatHari($formattedDate)),
                'status_jam_kerja' => $jamkerja,
                'status_libur_akademik' => $kalenderAkademik,
            ];
        } else {
            $result = [
                'status' => 0,
                'text' => 'TH',
                'date' => Str::upper(formatHari($formattedDate)),
                'status_jam_kerja' => $jamkerja,
                'status_libur_akademik' => $kalenderAkademik,
            ];
        }

        return $result;
    }

    static function getAbsenByGuru($guru, $hari)
    {
        $existingAbsensi = Absensi::where('guru_id', $guru)
            ->whereRaw('DAYNAME(tanggal_absen) = ?', [ucfirst(strtolower($hari))])
            ->count();

        $result = [
            'status' => $existingAbsensi == 0 ? 0 : 1,
            'message' => $existingAbsensi == 0 ? 'BELUM PERNAH MENGABSENKAN' : 'MENGABSENKAN '. $existingAbsensi,
        ];

        return $result;
    }
}
