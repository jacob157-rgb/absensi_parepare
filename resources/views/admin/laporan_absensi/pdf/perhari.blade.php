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

        .nowrap {
            white-space: nowrap;
        }
        .signature-gap {
            height: 50px;
        }
    </style>
    <table style="width: 35%">
        <tr>
            <th>KELAS</th>
            <td>: {{ $kelas->tingkat_kelas }} {{ $kelas->kelompok }} ({{ $kelas->urusan_kelas }})
                (jurusan
                {{ $kelas->jurusan }}) </td>
        </tr>
        <tr>
            <th>PERIODE</th>
            <td>: {{ $bulan }} {{ $tahun }}</td>
        </tr>

    </table>

    <table style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
            <th style="text-align: center; border: 1px solid black;" rowspan="2">NO</th>
            <th class="nowrap" style="text-align: center; border: 1px solid black;" rowspan="2">NISN</th>
            <th class="nowrap" style="text-align: center; border: 1px solid black;" rowspan="2">NAMA SISWA</th>
            <th style="text-align: center; border: 1px solid black;" rowspan="2">JK</th>
            <th style="text-align: center; border: 1px solid black;" colspan="31">TANGGAL</th>
            <th style="text-align: center; border: 1px solid black;" colspan="3">KEHADIRAN</th>
        </tr>
        <tr style="border: 1px solid black;">
            <!-- Dates from 1 to 31 -->
            @for ($i = 1; $i <= 31; $i++)
                <th style="text-align: center; border: 1px solid black; width: 40px !important;">{{ sprintf('%02d', $i) }}
                </th>
            @endfor
            <th style="text-align: center; border: 1px solid black;">H</th>
            <th style="text-align: center; border: 1px solid black;">TH</th>
            <th style="text-align: center; border: 1px solid black;">I</th>
        </tr>
        @php
            $total_hadir = 0;
            $total_izin = 0;
            $total_tidak_hadir = 0;
        @endphp
        @foreach ($siswa as $row)
            @php
                $jumlah_hadir = 0;
                $jumlah_izin = 0;
                $jumlah_th = 0;
            @endphp
            <tr style="border: 1px solid black;">
                <td style="text-align: center; border: 1px solid black;">{{ $loop->iteration }}</td>
                <td class="nowrap" style="text-align: center; border: 1px solid black;">{{ $row->nisn }}</td>
                <td class="nowrap" style="text-align: center; border: 1px solid black;">{{ $row->nama }}</td>
                <td style="text-align: center; border: 1px solid black;">
                    {{ $row->jenis_kelamin == 'LAKI-LAKI' ? 'L' : 'P' }}</td>
                @for ($i = 1; $i <= 31; $i++)
                    @php
                        $absen = \App\Models\Absensi::getAbsen($row->id, $i);
                        if ($absen['status'] == 1 && !$absen['status_jam_kerja'] && !$absen['status_libur_akademik']) {
                            $jumlah_hadir++;
                            $total_hadir++;
                        } elseif ($absen['status'] == 0 && !$absen['status_jam_kerja'] && !$absen['status_libur_akademik']) {
                            $jumlah_th++;
                            $total_tidak_hadir++;
                        } elseif ($absen['status'] == 2 && !$absen['status_jam_kerja'] && !$absen['status_libur_akademik']) {
                            $jumlah_izin++;
                            $total_izin++;
                        }
                    @endphp

                    @if ($absen['status_jam_kerja'])
                        <td style="text-align: center; border: 1px solid black; background-color:  blue;"></td>
                    @elseif ($absen['status_libur_akademik'])
                        <td style="text-align: center; border: 1px solid black; background-color:  red;"></td>
                    @else
                        <td style="text-align: center; border: 1px solid black;">
                            {!! $absen['text'] !!}
                        </td>
                    @endif
                @endfor
                <td style="text-align: center; border: 1px solid black;">{{ $jumlah_hadir }}</td>
                <td style="text-align: center; border: 1px solid black;">{{ $jumlah_th }}</td>
                <td style="text-align: center; border: 1px solid black;">{{ $jumlah_izin }}</td>
            </tr>
        @endforeach
        <tr style="border: 1px solid black; font-weight: bold">
            <td class="nowrap" colspan="4"> &nbsp; &nbsp; &nbsp;JUMLAH TOTAL KEHADIRAN</td>
            @for ($i = 1; $i <= 31; $i++)
                <td style="text-align: center;">
                </td>
            @endfor
            <td style="text-align: center; border: 1px solid black;">{{ $total_hadir }}</td>
            <td style="text-align: center; border: 1px solid black;">{{ $total_tidak_hadir }}</td>
            <td style="text-align: center; border: 1px solid black;">{{ $total_izin }}</td>
        </tr>
        <tr style="border: 1px solid black; font-weight: bold">
            <td colspan="4">&nbsp; &nbsp; &nbsp;JUMLAH LAKI-LAKI</td>
            @for ($i = 1; $i <= 31; $i++)
                <td style="text-align: center;">
                </td>
            @endfor
            <td colspan="3" style="text-align: center; border: 1px solid black;">
                {{ $siswa->where('jenis_kelamin', 'LAKI-LAKI')->count() }}</td>
        </tr>
        <tr style="border: 1px solid black; font-weight: bold">
            <td colspan="4">&nbsp; &nbsp; &nbsp;JUMLAH PEREMPUAN</td>
            @for ($i = 1; $i <= 31; $i++)
                <td style="text-align: center;">
                </td>
            @endfor
            <td colspan="3" style="text-align: center; border: 1px solid black;">
                {{ $siswa->where('jenis_kelamin', 'PEREMPUAN')->count() }}</td>
        </tr>
        <tr style="border: 1px solid black; font-weight: bold">
            <td colspan="4">&nbsp; &nbsp; &nbsp;JUMLAH TOTAL SISWA</td>
            @for ($i = 1; $i <= 31; $i++)
                <td style="text-align: center;">
                </td>
            @endfor
            <td colspan="3" style="text-align: center; border: 1px solid black;"> {{ $siswa->count() }}</td>
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
