@extends('layouts.qrcode')
@section('content')
    <div class="relative min-h-screen items-center justify-center overflow-x-hidden bg-white lg:flex">
        <div class="w-full sm:w-2/4">
            <div class="mt-5 flex flex-row justify-center lg:hidden">
                <div class="m-2 flex flex-col justify-center text-center">
                    <img alt="" class="w-24 flex-shrink-0 self-center object-fill"
                        src="{{ asset('assets/img/kemenag.png') }}">
                </div>
                <div class="m-2 flex flex-col justify-center text-center">
                    <img alt="" class="w-28 flex-shrink-0 self-center object-fill"
                        src="{{ asset('assets/img/man2pare.png') }}">
                </div>
            </div>

            <div class="flex flex-col justify-center rounded-sm p-6 text-center lg:max-w-md lg:text-left xl:max-w-lg">
                <div
                    class="hidden flex-col space-y-4 sm:flex-row sm:items-center sm:justify-center sm:space-x-4 sm:space-y-0 lg:mb-7 lg:flex lg:justify-start">
                    <img class="h-20 object-fill sm:h-24" src="{{ asset('assets/img/kemenag.png') }}">
                    <img class="h-20 object-fill sm:h-24" src="{{ asset('assets/img/man2pare.png') }}">
                </div>

                <h1 class="text-xl font-bold leading-none sm:text-4xl">
                    MESIN ABSENSI<br>
                    <span class="truncate text-blue-600 sm:text-5xl">{{ $sekolah->nama }}</span>
                </h1>
                <p class="mb-6 mt-4 flex text-base sm:mb-8 sm:mt-6 sm:text-lg">
                    Silakan masukkan Kode Siswa untuk memulai proses absensi.
                </p>

                <a href="/"
                    class="inline-flex w-56 items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-left">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg> Kembali Kedashboard
                </a>
            </div>
        </div>

        <div class="relative z-20 w-full rounded-lg border bg-white px-5 py-12 shadow-lg sm:w-96">
            <div class="w-full items-center justify-center">
                <span for="kode-siswa" class="font-medium">Masukkan Kode Siswa</span> <br>
                <input id="kode-siswa" type="text" name="kode-siswa" autocomplete="off"
                    class="@error('kode-siswa') mt-5 border-red-500 @enderror block w-full rounded border py-3 pe-10 ps-4 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Masukkan Kode Siswa di sini" value="" autofocus>
                <label for="kode-siswa" class="text-xs font-normal text-blue-500"> Arahkan kursor kedalam inputan untuk
                    membaca mesin.</label>
            </div>

            <div class="mt-5">
                <p class="font-medium">Output Kode : <span id="display-siswa-code" class="text-sm text-gray-600"></span></p>
                <span id="loading" class="text-sm text-gray-600"></span>
            </div>
        </div>
    </div>

    <form id="absenForm" action="{{ route('pages.storeAbsenMesin') }}" method="POST">
        @csrf
        <input type="hidden" class="display-siswa-code" name="nik" id="nik_siswa">
        <input type="hidden" value="{{ $lembaga->id }}" name="sekolah_id">
        <button type="submit" id="submitButton" class="hidden">Submit</button>
    </form>


    <div class="flex w-full justify-center lg:px-10 mt-10 lg:mt-0">
        <div class="w-full overflow-x-auto rounded border bg-white p-3 shadow">
            <div>
                <h1 class="mb-4 flex items-center text-sm font-medium lg:text-xl"> <svg xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-text">
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <rect width="16" height="20" x="4" y="2" rx="2" />
                        <path d="M9.5 8h5" />
                        <path d="M9.5 12H16" />
                        <path d="M9.5 16H14" />
                    </svg> Daftar siswa yang telah absen</h1>
            </div>
            <div class="inline-block w-full p-1.5 align-middle">
                <div class="divide-y divide-gray-200 rounded-lg border dark:divide-neutral-700 dark:border-neutral-700">
                    <div class="px-4 py-3">
                        <div class="relative max-w-xs">
                            <label for="hs-table-search" class="sr-only">Search</label>
                            <input type="text" name="hs-table-search" id="global-search"
                                class="block w-full rounded-lg border-gray-200 px-3 py-2 ps-9 text-sm shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Cari Nama Siswa">
                            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="search-table min-w-full table-auto divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                                        No.</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                                        Nama Siswa</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                                        Kelas</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                                        Jam Absen</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                                        Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($showAbsensi as $row)
                                    @php
                                        $kelas = App\Models\Kelas::getById($row->siswa->id);
                                        $hariAbsen = \Carbon\Carbon::parse($row->tanggal_absen)->format('l');
                                        $hariIndo = strtoupper(
                                            \Carbon\Carbon::parse($row->tanggal_absen)->translatedFormat('l'),
                                        );
                                        $jamAbsenSiswa = \Carbon\Carbon::parse($row->tanggal_absen)->format('H:i');
                                        $jamTerlambat = $jam_absen[$hariIndo]->jam_terlambat ?? null;
                                        $keterangan = 'Tidak Ada Data';

                                        if ($jamAbsenSiswa > $jamTerlambat) {
                                            $keterangan = 0;
                                            $jamAbsenSiswa = Carbon\Carbon::parse($jamAbsenSiswa);
                                            $jamTerlambat = Carbon\Carbon::parse($jamTerlambat);
                                            $selisih = $jamAbsenSiswa->diffInMinutes($jamTerlambat);
                                        } else {
                                            $keterangan = 1;
                                        }
                                    @endphp
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="truncate px-4 py-3 text-sm font-medium capitalize">
                                            {{ $loop->iteration }}</td>
                                        <td class="truncate px-4 py-3 text-sm font-medium capitalize">
                                            {{ $row->siswa->nama }}</td>
                                        <td class="truncate px-4 py-3 text-sm font-medium capitalize">
                                            Kelas {{ $row->siswa->kelas->tingkat_kelas }}
                                            {{ $row->siswa->kelas->kelompok }} ( {{ $row->siswa->kelas->urusan_kelas }} )
                                            jurusan {{ $row->siswa->kelas->jurusan }}
                                        </td>
                                        <td class="truncate px-4 py-3 text-xs font-medium capitalize">
                                            {{ \Carbon\Carbon::parse($row->tanggal_absen)->format('H:i:s') }}</td>
                                        <td class="truncate px-4 py-3 text-xs font-medium capitalize">
                                            @if ($keterangan == 0)
                                                {{ $selisih }} Menit
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                        @if ($showAbsensi->count() == 0)
                            <h1 class="p-3 text-center font-mono italic text-gray-500">-- Belum Ada yang absen menggunakan
                                mesin --</h1>
                        @endif
                    </div>
                    {{ $showAbsensi->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div> <br><br><br><br>
@endsection

@push('addon-style')
    <style>

    </style>
@endpush

@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kode-siswa').on('input', function() {
                let inputValue = $(this).val();

                $('#display-siswa-code').html(inputValue);
                $('#loading').html('Loading....');
                $('#nik_siswa').val(inputValue);

                if (inputValue.length > 5) {
                    $('#absenForm').submit();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('global-search');
            const tables = document.querySelectorAll('.search-table');

            searchInput.addEventListener('keyup', function() {
                const searchTerm = searchInput.value.toLowerCase();

                tables.forEach(function(table) {
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(function(row) {
                        const cells = row.querySelectorAll('td');
                        let rowText = '';

                        cells.forEach(function(cell) {
                            rowText += cell.textContent.toLowerCase() + ' ';
                        });

                        row.style.display = rowText.includes(searchTerm) ? '' : 'none';
                    });
                });
            });
        });
    </script>
@endpush
