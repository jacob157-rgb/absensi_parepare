@extends('layouts.guru')
@section('content')
    <div class="flex flex-col justify-center space-y-2 lg:flex-row lg:space-x-2">
        <div class="w-full max-w-md bg-gray-50 p-8 text-gray-800 shadow sm:flex sm:space-x-6">
            <div class="mb-6 flex h-44 w-full flex-shrink-0 items-center justify-center sm:mb-0 sm:h-32 sm:w-32">
                <img src="{{ asset('assets/img/profile.png') }}" alt=""
                    class="aspect-square h-full w-auto rounded bg-gray-100 object-contain">
            </div>
            <div class="flex w-full flex-col items-center justify-center">
                <div class="w-full pb-5">
                    <h2 class="text-2xl font-semibold">{{ $guru->nama }}</h2>
                </div>
                <table class="w-full">
                    <tr class="w-full">
                        <td class="w-full py-1 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-id-card">
                                    <path d="M16 10h2" />
                                    <path d="M16 14h2" />
                                    <path d="M6.17 15a3 3 0 0 1 5.66 0" />
                                    <circle cx="9" cy="11" r="2" />
                                    <rect x="2" y="5" width="20" height="14" rx="2" />
                                </svg>
                                <span class="mr-0 w-1/4 pr-0">NIK/NIP </span>:
                                {{ $guru->nik_nip }}<br />
                            </div>
                        </td>
                    </tr>
                    <tr class="w-full">
                        <td class="w-full py-1 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-book-open-check">
                                    <path d="M8 3H2v15h7c1.7 0 3 1.3 3 3V7c0-2.2-1.8-4-4-4Z" />
                                    <path d="m16 12 2 2 4-4" />
                                    <path d="M22 6V3h-6c-2.2 0-4 1.8-4 4v14c0-1.7 1.3-3 3-3h7v-2.3" />
                                </svg>

                                <span class="mr-0 w-1/4 pr-0">PIKET </span>:
                                @if ($status_absen)
                                    <span
                                        class="text-nowrap inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800 dark:bg-green-800/30 dark:text-green-500">Aktif</span><br />
                                @else
                                    <span
                                        class="text-nowrap inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-800 dark:bg-red-800/30 dark:text-red-500">Tidak
                                        Aktif</span><br />
                                @endif
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="w-full max-w-md bg-gray-50 p-8 text-gray-800 shadow sm:flex sm:space-x-6">
            <div class="flex w-full flex-col">
                <div class="w-full pb-5">
                    <h2 class="text-2xl font-semibold">JAM ABSEN HARI {{ $jam_absen?->hari ?? 'LIBUR' }}</h2>
                </div>
                <table class="w-full">
                    <tr class="w-full">
                        <td class="w-full py-1 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clock-arrow-up">
                                    <path d="M13.228 21.925A10 10 0 1 1 21.994 12.338" />
                                    <path d="M12 6v6l1.562.781" />
                                    <path d="m14 18 4-4 4 4" />
                                    <path d="M18 22v-8" />
                                </svg>
                                <span class="mr-0 w-1/2 pr-0">JAM ABSEN MASUK </span>: @if ($jam_absen)
                                    {{ \Carbon\Carbon::parse($jam_absen?->jam_masuk)->format('H:i:s') }}<br />
                                @else
                                    -<br />
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="w-full">
                        <td class="w-full py-1 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clock-arrow-down">
                                    <path d="M12.338 21.994A10 10 0 1 1 21.925 13.227" />
                                    <path d="M12 6v6l2 1" />
                                    <path d="m14 18 4 4 4-4" />
                                    <path d="M18 14v8" />
                                </svg>
                                <span class="mr-0 w-1/2 pr-0">JAM ABSEN TERLAMBAT </span>: @if ($jam_absen)
                                    {{ \Carbon\Carbon::parse($jam_absen?->jam_terlambat)->format('H:i:s') }}<br />
                                @else
                                    -<br />
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col justify-center space-y-2 lg:flex-row lg:space-x-2">
        <div class="inline-block min-w-full p-1.5 align-middle">
            <div class="overflow-hidden rounded border dark:border-neutral-700">
                <h2
                    class="bg-gray-60000 focus:shadow-outline-blue m-3 my-6 flex items-center rounded p-3 font-semibold shadow focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-clock-1">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 14.5 8" />
                    </svg>
                    <span class="ml-2">JADWAL PIKET ANDA</span>
                </h2>
                @php
                    use Carbon\Carbon;
                    $hariSekarang = strtoupper(Carbon::now()->locale('id')->dayName);
                @endphp

                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                                HARI PIKET
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        <tr class="hidden lg:block">
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                <div class="max-w-full overflow-x-auto">
                                    @foreach ($jadwal_piket as $row)
                                        @php
                                            // Cek apakah hari ini sama dengan hari pada jadwal piket
                                            $warna =
                                                strtoupper($row->hari) === $hariSekarang
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-500'
                                                    : 'bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500';
                                        @endphp
                                        <span
                                            class="{{ $warna }} inline-flex items-center gap-x-1.5 rounded-full px-3 py-1.5 text-xs font-medium">
                                            <span
                                                class="size-1.5 {{ strtoupper($row->hari) === $hariSekarang ? 'bg-green-800 dark:bg-green-500' : 'bg-red-800 dark:bg-red-500' }} inline-block rounded-full"></span>
                                            {{ $row->hari }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        @foreach ($jadwal_piket as $row)
                            <tr class="block lg:hidden">
                                <td
                                    class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    <div class="max-w-full overflow-x-auto">
                                        @php
                                            $warna =
                                                strtoupper($row->hari) === $hariSekarang
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-800/30 dark:text-green-500'
                                                    : 'bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500';
                                        @endphp
                                        <span
                                            class="{{ $warna }} inline-flex items-center gap-x-1.5 rounded-full px-3 py-1.5 text-xs font-medium">
                                            <span
                                                class="size-1.5 {{ strtoupper($row->hari) === $hariSekarang ? 'bg-green-800 dark:bg-green-500' : 'bg-red-800 dark:bg-red-500' }} inline-block rounded-full"></span>
                                            {{ $row->hari }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="my-4 flex flex-col">
        <div class="-m-1.5">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div class="rounded border dark:border-neutral-700">
                    <div class="grid grid-cols-2 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-6">
                        <button id="openCameraBtn" {{ !$status_absen ? 'disabled' : ' ' }}
                            class="flex h-full w-full flex-col items-center justify-center rounded-md p-4 shadow hover:border hover:border-blue-500">
                            <div class="mb-2 flex h-10 w-10 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera">
                                    <path
                                        d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                    <circle cx="12" cy="13" r="3" />
                                </svg>
                            </div>
                            <p class="truncate text-sm font-medium">KAMERA</p>
                        </button>

                        <a href="{{ route('guru.getAbsenManual') }}" id="openQr" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="hs-static-backdrop-modal"
                            data-hs-overlay="#hs-static-backdrop-modal"
                            class="flex h-full w-full flex-col items-center justify-center rounded-md p-4 shadow hover:border hover:border-blue-500">
                            <div class="mb-2 flex h-10 w-10 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-pen">
                                    <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                                    <path d="M2 6h4" />
                                    <path d="M2 10h4" />
                                    <path d="M2 14h4" />
                                    <path d="M2 18h4" />
                                    <path
                                        d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                                </svg>
                            </div>
                            <p class="truncate text-sm font-medium">ABSENSI MANUAL</p>
                        </a>
                        <a href="{{ route('guru.showAbsen') }}" id="openQr" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="hs-static-backdrop-modal"
                            data-hs-overlay="#hs-static-backdrop-modal"
                            class="flex h-full w-full flex-col items-center justify-center rounded-md p-4 shadow hover:border hover:border-blue-500">
                            <div class="mb-2 flex h-10 w-10 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history">
                                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                                    <path d="M3 3v5h5" />
                                    <path d="M12 7v5l4 2" />
                                </svg>
                            </div>
                            <p class="truncate text-sm font-medium">RIWAYAT ABSENSI</p>
                        </a>

                        {{-- <a href="{{ !$status_absen ? 'javascript:void(0)' : route('guru.codeqrIndex') }}" id="openQr"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-static-backdrop-modal"
                            data-hs-overlay="#hs-static-backdrop-modal"
                            class="flex h-full w-full flex-col items-center justify-center rounded-md p-4 shadow hover:border hover:border-blue-500">
                            <div class="mb-2 flex h-10 w-10 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-qr-code">
                                    <rect width="5" height="5" x="3" y="3" rx="1" />
                                    <rect width="5" height="5" x="16" y="3" rx="1" />
                                    <rect width="5" height="5" x="3" y="16" rx="1" />
                                    <path d="M21 16h-3a2 2 0 0 0-2 2v3" />
                                    <path d="M21 21v.01" />
                                    <path d="M12 7v3a2 2 0 0 1-2 2H7" />
                                    <path d="M3 12h.01" />
                                    <path d="M12 3h.01" />
                                    <path d="M12 16v.01" />
                                    <path d="M16 12h1" />
                                    <path d="M21 12v.01" />
                                    <path d="M12 21v-1" />
                                </svg>
                            </div>
                            <p class="truncate text-sm font-medium">KODE QR</p>
                        </a> --}}
                        {{-- <a href="{{ !$status_absen ? 'javascript:void(0)' : route('guru.codeMesinIndex') }}"
                            id="openQr" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="hs-static-backdrop-modal" data-hs-overlay="#hs-static-backdrop-modal"
                            class="flex h-full w-full flex-col items-center justify-center rounded-md p-4 shadow hover:border hover:border-blue-500">
                            <div class="mb-2 flex h-10 w-10 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scan-eye">
                                    <path d="M3 7V5a2 2 0 0 1 2-2h2" />
                                    <path d="M17 3h2a2 2 0 0 1 2 2v2" />
                                    <path d="M21 17v2a2 2 0 0 1-2 2h-2" />
                                    <path d="M7 21H5a2 2 0 0 1-2-2v-2" />
                                    <circle cx="12" cy="12" r="1" />
                                    <path
                                        d="M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0" />
                                </svg>
                            </div>
                            <p class="truncate text-sm font-medium">MESIN</p>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($status_absen)
        <!-- Reader Modal -->
        <div id="readerModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
            <div class="mx-auto w-full max-w-md rounded-lg bg-white p-5">
                <div class="mb-3 flex gap-2">
                    <select id="cameraSelect"
                        class="w-full rounded-md border bg-white p-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </select>
                    <button id="startScanningBtn" class="rounded-md bg-blue-500 px-4 py-2 text-white">Mulai</button>
                </div>
                <div id="reader" style="width: 100%" class="rounded-md"></div>
                <button id="closeReader" class="mt-3 w-full rounded-md bg-red-500 px-4 py-2 text-white">Close</button>
            </div>
        </div>
    @endif
    <form id="absenForm" action="{{ route('guru.storeAbsen') }}" method="POST">
        @csrf
        <input type="hidden" name="nik" id="nik_siswa">
        <input type="hidden"value="{{ $guru->sekolah_id }}" name="sekolah_id">
        <input type="hidden" value="{{ $guru->id }}" name="guru_id">
        <button type="submit" id="submitButton" class="hidden">Submit</button>
    </form>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
