@extends('layouts.kop')
@section('title', $pages)
@section('content')
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        .upper {
            text-transform: uppercase !important;
        }

        .blue-background {
            background-color: #0000FF;
            color: white;
        }

        .red-background {
            background-color: #FF0000;
            color: white;
        }

        .signatures {
            border: none;
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .signature-block {
            text-align: left;
            width: 30%;
        }

        .signature-block span {
            display: block;
            margin-top: 10px;
        }

        .signature-table {
            width: 100%;
            border: none;
        }

        .center {
            text-align: center;
        }

        .signature-table td {
            border: none;
            text-align: center;
        }

        .signature-gap {
            height: 50px;
        }
    </style>
    <center><b>ABSENSI SISWA</b></center>
    <table style="width: 35%">
        <tr>
            <th>NAMA SISWA</th>
            <td>: {{ $siswa->nama }}</td>
        </tr>
        <tr>
            <th>KELAS</th>
            <td>: {{ $siswa->kelas->tingkat_kelas }} {{ $siswa->kelas->kelompok }} ({{ $siswa->kelas->urusan_kelas }})
                (jurusan
                {{ $siswa->kelas->jurusan }}) </td>
        </tr>
        <tr>
            <th>BULAN</th>
            <td>: {{ $bulan }}</td>
        </tr>
        <tr>
            <th>TAHUN</th>
            <td>: {{ $tahun }}</td>
        </tr>

    </table>

    @php
        $jumlahHadir = 0;
        $jumlahTerlambat = 0;
        $jumlahTidakHadir = 0;
        $jumlahIzin = 0;
    @endphp

    <table border="1">
        <thead>
            <tr>
                <th>NO.</th>
                <th>TANGGAL</th>
                <th>JAM ABSEN</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dates as $date)
                @php
                    $isIzin = false;
                    $keteranganIzin = '';

                    // Check if the date is within any of the izin periods
                    foreach ($izin as $izinItem) {
                        $tanggalMulai = \Carbon\Carbon::parse($izinItem->tanggal_mulai);
                        $tanggalSelesai = \Carbon\Carbon::parse($izinItem->tanggal_selesai);
                        $currentDate = \Carbon\Carbon::parse($date);

                        if ($currentDate->between($tanggalMulai, $tanggalSelesai)) {
                            $isIzin = true;
                            $keteranganIzin = $izinItem->kategori;
                            break;
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ formatTanggalLengkap($date) }}</td>
                    <td>
                        @if (isset($existingAbsensi[$date]))
                            {{ \Carbon\Carbon::parse($existingAbsensi[$date]->tanggal_absen)->format('H:i:s') }}
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        @if ($isIzin)
                            Izin
                            @php $jumlahIzin++; @endphp
                        @else
                            @if (isset($existingAbsensi[$date]))
                                @php
                                    $dayOfWeek = \Carbon\Carbon::parse($date)->translatedFormat('l');
                                    $hari = strtoupper($dayOfWeek);
                                    $jamMasuk = $jam_absen[$hari]->jam_masuk ?? null;
                                    $jamTerlambat = $jam_absen[$hari]->jam_terlambat ?? null;

                                    $attendanceTime = \Carbon\Carbon::parse(
                                        $existingAbsensi[$date]->tanggal_absen,
                                    )->format('H:i');
                                    $attendanceTime = \Carbon\Carbon::parse($attendanceTime);
                                    $jamTerlambat = \Carbon\Carbon::parse($jamTerlambat);
                                    $selisih = $attendanceTime->diffInMinutes($jamTerlambat);
                                @endphp

                                @if ($attendanceTime > $jamTerlambat)
                                    Terlambat {{ $selisih }} Menit
                                    @php $jumlahTerlambat++; @endphp
                                @else
                                    Hadir
                                    @php $jumlahHadir++; @endphp
                                @endif
                            @else
                                Tidak Hadir
                                @php $jumlahTidakHadir++; @endphp
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Summary Table --}}
    <table border="1" style="margin-top: 20px;">
        <tr>
            <th>Jumlah Hadir</th>
            <td>{{ $jumlahHadir }}</td>
        </tr>
        <tr>
            <th>Jumlah Terlambat</th>
            <td>{{ $jumlahTerlambat }}</td>
        </tr>
        <tr>
            <th>Jumlah Tidak Hadir</th>
            <td>{{ $jumlahTidakHadir }}</td>
        </tr>
        <tr>
            <th>Jumlah Izin</th>
            <td>{{ $jumlahIzin }}</td>
        </tr>
    </table>


    <div class="signatures">
        <table class="signature-table">
            <tr>
                <td>
                    <p></p>
                </td>
                <td></td>
                <td>
                    <p>{{ $sekolah->tempat_cetak }}, {{ $date }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p></p>
                </td>
                <td>
                    <p></p>
                </td>
                <td>
                    <p>KEPALA MADRASAH</p>
                </td>
            </tr>
            <tr class="signature-gap">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="text-decoration: underline;"></td>
                <td style="text-decoration: underline;"></td>
                <td style="text-decoration: underline;"><span>{{ $sekolah->nama_kamad }}</span></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td><span>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp;</span></td>
                <td>
                    <span>
                        @if ($sekolah->status_kamad == 'PNS')
                            NIP.{{ $sekolah->nip_kamad }}
                        @endif
                    </span>
                </td>
            </tr>
        </table>
    </div>
@endsection
