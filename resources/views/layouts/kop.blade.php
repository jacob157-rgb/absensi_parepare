<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/img/kemenag.png') }}" rel="icon">
    <title>@yield('title') Dicetak Pada {{ date('Y-m-d') }}</title>
    <style>
        body {
            font-family: Times New Roman !important;
        }
        .garis {
            border-top: 3px solid black;
            height: 2px;
            border-bottom: 1px solid black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
        }
        .header-content {
            text-align: center;
            margin-right: 40px;
        }
        .header-content h3 {
            margin: 0;
        }
        .header-content h5 {
            margin: 0;
        }
        .header-content p {
            margin: 5px 0 0 0;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td width="100px" align="left">
                <img src="{{ asset($sekolah?->logo_kiri) }}" alt="" height="100px">
            </td>
            <td class="header-content">
                <h3>{{ $sekolah?->instansi }}</h3>
                <h3><b>{{ $sekolah?->sub_instansi }}</b></h3>
                <h3><b>{{ $sekolah?->nama_sekolah }}</b></h3>
                <p>
                    {{ ucwords(strtolower($sekolah?->alamat)) }} Kec. {{ ucwords(strtolower($sekolah->kecamatan)) }} Kab. {{ ucwords(strtolower($sekolah->kabupaten)) }} {{ ucwords(strtolower($sekolah->provinsi)) }}<br>
                    Telp. {{ $sekolah?->no_telp }}
                </p>
            </td>
            @if ($sekolah?->logo_kanan != null)
            <td width="100px" align="right">
                <img src="{{ asset($sekolah?->logo_kanan) }}" alt="" height="100px">
            </td>
            @endif
        </tr>
    </table>
    <hr class="garis" />
    @yield('content')
</body>

 {{--  <script>
    window.print()
 </script>   --}}
</html>
