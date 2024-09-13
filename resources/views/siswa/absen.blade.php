@extends('layouts.siswa')
@section('content')
    @php
        $wali = Auth::guard('wali')->check();
    @endphp
    <div class="flex flex-col justify-center space-y-2 lg:flex-row lg:space-x-2">
        <div class="w-full max-w-md bg-gray-50 p-8 text-gray-800 shadow sm:flex sm:space-x-6">
            <div class="mb-6 flex h-44 w-full flex-shrink-0 items-center justify-center sm:mb-0 sm:h-32 sm:w-32">
                <img src="{{ asset('assets/img/student.png') }}" alt=""
                    class="aspect-square h-full w-auto rounded bg-gray-100 object-contain">
            </div>
            <div class="flex w-full flex-col items-center justify-center">
                <div class="w-full pb-5">
                    <h2 class="text-2xl font-semibold">{{ $siswa->nama }}</h2>
                </div>
                <table class="w-full">
                    <tr class="w-full">
                        <td class="w-full py-1 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-school">
                                    <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                                    <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                                    <path d="M18 5v17" />
                                    <path d="m4 6 8-4 8 4" />
                                    <path d="M6 5v17" />
                                    <circle cx="12" cy="9" r="2" />
                                </svg>

                                <span class="mr-0 w-1/4 pr-0">KELAS </span>:
                                {{ $siswa->kelas->tingkat_kelas }}
                                {{ $siswa->kelas->kelompok }} ( {{ $siswa->kelas->urusan_kelas }} ) jurusan
                                {{ $siswa->kelas->jurusan }}<br />
                            </div>
                        </td>
                    </tr>
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
                                <span class="mr-0 w-1/4 pr-0">NISN </span>:
                                {{ $siswa->nisn }}<br />
                            </div>
                        </td>
                    </tr>
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
                                <span class="mr-0 w-1/4 pr-0">NIK </span>:
                                {{ $siswa->nik }}<br />
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

                                <span class="mr-0 w-1/4 pr-0">KET </span>:
                                <span
                                    class="{{ $existingAbsensi ? ' text-green-800 bg-green-100 ' : ' text-red-800 bg-red-100 ' }} inline-flex items-center rounded-full px-3 py-1 text-xs font-medium">
                                    {{ $existingAbsensi ? 'SUDAH ABSEN' : 'BELUM ABSEN' }}
                                </span>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-clock-arrow-down">
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



    <div class="my-4 flex flex-col">
        <div class="-m-1.5">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div class="rounded border dark:border-neutral-700">
                    <div class="grid grid-cols-3 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-6">
                        @if (!$wali)
                            <button id="openCameraBtn"
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
                        @endif

                        <button id="openQr" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="hs-static-backdrop-modal" data-hs-overlay="#hs-static-backdrop-modal"
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
                        </button>

                        <form action="{{ route('siswa.location') }}" method="post" id="loginForm">
                            @csrf
                            <button id="submitButton" type="button"
                                class="flex h-full w-full flex-col items-center justify-center rounded-md p-4 shadow hover:border hover:border-blue-500">
                                <div class="mb-2 flex h-10 w-10 items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-map-pin-house">
                                        <path
                                            d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
                                        <path
                                            d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
                                        <path d="M18 22v-3" />
                                        <circle cx="10" cy="10" r="3" />
                                    </svg>
                                </div>
                                <p class="truncate text-sm font-medium">LOKASI</p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="flex h-80 w-full flex-col lg:flex-row">
        <!-- Card pertama -->
        <div class="mt-6 flex-1 bg-gray-50 p-8 text-gray-800 shadow">
            <h2
                class="bg-gray-60000 focus:shadow-outline-blue mb-2 flex items-center rounded p-3 font-semibold shadow focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-map-pinned">
                    <path
                        d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                    <circle cx="12" cy="8" r="2" />
                    <path
                        d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                </svg>
                <span class="ml-2 text-xs lg:text-sm">LOKASI SEKOLAH</span>
            </h2>
            <div class="h-full">
                <!-- Peta pertama -->
                <iframe id="map1" class="h-44 w-full"
                    src="https://www.google.com/maps?q={{ $lembaga->latitude }}, {{ $lembaga->longitude }}&z=15&output=embed"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
        </div>

        <!-- Card kedua -->
        <div class="mt-6 flex-1 bg-gray-50 p-8 text-gray-800 shadow">
            <h2
                class="bg-gray-60000 focus:shadow-outline-blue mb-2 flex items-center rounded p-3 font-semibold shadow focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-map-pin-house">
                    <path
                        d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
                    <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
                    <path d="M18 22v-3" />
                    <circle cx="10" cy="10" r="3" />
                </svg>
                <span class="ml-2 text-xs lg:text-sm">LOKASI ANDA <span id="mileage"></span> DARI SEKOLAH</span>
            </h2>
            <div class="h-full">
                <!-- Peta kedua -->
                @if (!$meta_siswa)
                    <span class="inline-flex h-full w-full items-center justify-center font-semibold">
                        lokasi belum ditemukan
                    </span>
                @else
                    <iframe id="map2" class="h-44 w-full"
                        src="https://www.google.com/maps?q={{ $meta_siswa->latitude }}, {{ $meta_siswa->longitude }}&z=15&output=embed"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
                @endif
            </div>
        </div>
    </div>




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


    <!-- Qr Modal -->
    <div id="hs-static-backdrop-modal"
        class="hs-overlay size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 m-3 mt-0 opacity-0 transition-all ease-out sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="pointer-events-auto flex flex-col rounded-xl border bg-white shadow-sm dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between border-b px-4 py-3 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        ID : {{ $siswa->nik }}
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-static-backdrop-modal">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4">
                    <p class="mt-1 flex justify-center text-center text-gray-800 dark:text-neutral-400">
                        {!! $qrCode !!}
                    </p>
                </div>
                <div class="flex items-center justify-end gap-x-2 border-t px-4 py-3 dark:border-neutral-700">
                    <button type="button"
                        class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-static-backdrop-modal">
                        TUTUP
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Form manual di HTML -->
    <form id="absenForm" action="{{ route('siswa.storeAbsen') }}" method="POST">
        @csrf
        <input type="hidden" name="nik" value="{{ $siswa->nik }}">
        <input type="hidden" name="code_unique" id="codeUnique">
        <input type="hidden" name="guru_id" id="guruId">
        <button type="submit" id="submitButton" class="hidden">Submit</button>
    </form>
@endsection

@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
    <script src="{{ asset('assets/js/location.js') }}"></script>

    <script>
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c;
            return distance;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const lembagaLat = {{ $lembaga->latitude }};
            const lembagaLon = {{ $lembaga->longitude }};

            const siswaLat = {{ $meta_siswa->latitude }};
            const siswaLon = {{ $meta_siswa->longitude }};

            const maxRadius = 1;

            const distance = calculateDistance(lembagaLat, lembagaLon, siswaLat, siswaLon);

            if (distance > maxRadius) {
                document.getElementById("openCameraBtn").disabled = true;
                Swal.fire({
                    title: "Lokasi Terlalu Jauh ?",
                    text: "Anda berada di luar jangkauan lembaga, tidak bisa melakukan absen.",
                    icon: "info"
                });
            } else {
                document.getElementById("openCameraBtn").disabled = false;
            }
            document.getElementById("mileage").innerHTML = distance.toFixed(2) + " KM";
        });
    </script>
@endpush
