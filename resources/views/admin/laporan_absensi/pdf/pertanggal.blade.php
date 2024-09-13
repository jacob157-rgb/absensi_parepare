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

        .signature-table td {
            border: none;
            text-align: center;
        }

        .signature-gap {
            height: 50px;
        }
    </style>
    <p>
        <center>Laporan Absensi Tanggal {{ formatTanggalLengkap(request()->query('date')) }}</center>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jam Absen</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswaAbsensi as $row)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $row->nisn }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->kelas->tingkat_kelas }} {{ $row->kelas->kelompok }} ( {{ $row->kelas->urusan_kelas }} ) (
                        jurusan {{ $row->kelas->jurusan }} )</td>
                    <td>
                        @if ($row->absensi)
                            {{ \Carbon\Carbon::parse($row->absensi?->tanggal_absen)->format('H:i:s') }}
                        @else
                            Tidak Absen
                        @endif
                    </td>
                    @php
                        $jamAbsenSiswa = Carbon\Carbon::parse($row->absensi?->tanggal_absen)->format('H:i');
                        $jamTerlambat = Carbon\Carbon::parse($jam_absensi->jam_terlambat)->format('H:i');

                        $jamAbsenSiswa = Carbon\Carbon::parse($jamAbsenSiswa);
                        $jamTerlambat = Carbon\Carbon::parse($jamTerlambat);

                        if ($row->absensi) {
                            $selisih = $jamAbsenSiswa->diffInMinutes($jamTerlambat) . ' Menit';
                        } else {
                            $selisih = '-';
                        }
                    @endphp
                    <td>
                        @if ($jamAbsenSiswa > $jamTerlambat)
                            {{ $selisih }}
                        @else
                            &#10004;
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
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
