@extends('layouts.guru')
@section('content')
    <div class="flex flex-col my-4 border bg-white rounded shadow">
        <div class="-m-1.5">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded dark:border-neutral-700">
                    <h2
                        class="flex items-center p-3 m-3 my-6 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-notebook-pen">
                            <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                            <path d="M2 6h4" />
                            <path d="M2 10h4" />
                            <path d="M2 14h4" />
                            <path d="M2 18h4" />
                            <path
                                d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        </svg>
                        <span class="ml-2">RIWAYAT ABSENSI</span>
                    </h2>

                    <form id="kelas-form" action="" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
                        <label class="block text-sm mt-2">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Dari Tanggal</span>
                            <input type="date" name="sd" id="sd" value="{{ request('sd') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Berikan Alasannya" />
                        </label>
                        <label class="block text-sm mt-2">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Sampai Tanggal</span>
                            <input type="date" name="ed" id="ed" value="{{ request('ed') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Berikan Alasannya" />
                        </label>
                        <label class="block text-sm lg:mt-8 mt-2">
                            <button type="submit"
                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded shadow-inner active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-filter">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                </svg>
                                <span>FILTER</span>
                            </button>
                        </label>

                    </form>
                </div>
            </div>
        </div>
        <div class="w-full overflow-x-auto border-b border-l border-r">
            <table class="whitespace-no-wrap search-table w-full min-w-full">
                <thead>
                    <tr
                        class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                        <th class="px-4 py-3 truncate">Nama Siswa</th>
                        <th class="px-4 py-3 truncate">Kelas</th>
                        <th class="px-4 py-3 truncate">Jam AbsenKu</th>
                        <th class="px-4 py-3 truncate">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                    @foreach ($showAbsensi as $row)
                        @php
                            $kelas = App\Models\Kelas::getById($row->siswa->kelas_id);
                            $hariAbsen = \Carbon\Carbon::parse($row->tanggal_absen)->format('l'); // Mendapatkan nama hari absen
                            $hariIndo = strtoupper(\Carbon\Carbon::parse($row->tanggal_absen)->translatedFormat('l')); // Mendapatkan hari dalam bahasa Indonesia

                            $jamAbsenSiswa = \Carbon\Carbon::parse($row->tanggal_absen)->format('H:i');
                            $jamTerlambat = $jam_absen[$hariIndo]->jam_terlambat ?? null;
                            $keterangan = 'Tidak Ada Data';

                            if ($jamAbsenSiswa > $jamTerlambat) {
                                if ($jamAbsenSiswa > $jamTerlambat) {
                                    $keterangan = 0; //terlambat
                                } else {
                                    $keterangan = 1; //tidak
                                }

                                $jamAbsenSiswa = Carbon\Carbon::parse($jamAbsenSiswa);
                                $jamTerlambat = Carbon\Carbon::parse($jamTerlambat);

                                $selisih = $jamAbsenSiswa->diffInMinutes($jamTerlambat);
                            }
                        @endphp
                        <tr class="dark:text-gray-400 text-gray-700">
                            <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                                {{ $row->siswa->nama }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                                Kelas {{ $kelas?->tingkat_kelas }} {{ $kelas?->kelompok }} ( {{ $kelas?->urusan_kelas }} )
                                jurusan {{ $kelas?->jurusan }}
                            </td>
                            <td class="px-4 py-3 text-xs font-medium capitalize truncate">
                                {{ \Carbon\Carbon::parse($row->tanggal_absen)->format('H:i:s') }}
                            </td>
                            <td class="px-4 py-3 text-xs font-medium capitalize truncate">
                                @if ($keterangan == 0)
                                    {{ $selisih }} Menit
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-check-big text-green-500">
                                        <path d="M21.801 10A10 10 0 1 1 17 3.335" />
                                        <path d="m9 11 3 3L22 4" />
                                    </svg>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
