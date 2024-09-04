@extends('layouts.siswa')
@section('content')
    <div class="lg:flex lg:space-x-6">
        <div class="max-w-md p-8 mt-6 text-gray-800 shadow bg-gray-50 sm:flex sm:space-x-6">
            <div class="flex items-center justify-center flex-shrink-0 w-full mb-6 h-44 sm:mb-0 sm:h-32 sm:w-32">
                <img src="{{ asset('assets/img/student.png') }}" alt=""
                    class="object-contain w-auto h-full bg-gray-100 rounded aspect-square">
            </div>
            <div class="flex flex-col space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $siswa->nama }}</h2>
                </div>
                <table class="w-full">
                    <tr>
                        <td class="w-1/4 text-sm font-medium text-gray-600 align-top">
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
                                <span>KELAS</span>
                            </div>
                        </td>
                        <td class="text-sm font-medium text-gray-600"> &nbsp; : {{ $siswa->kelas->tingkat_kelas }}
                            {{ $siswa->kelas->kelompok }} ( {{ $siswa->kelas->urusan_kelas }} ) jurusan
                            {{ $siswa->kelas->jurusan }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/4 text-sm font-medium text-gray-600 align-top">
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
                                <span>NISN</span>
                            </div>
                        </td>
                        <td class="text-sm font-medium text-gray-600"> &nbsp; : {{ $siswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/4 text-sm font-medium text-gray-600 align-top">
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
                                <span>NIK</span>
                            </div>
                        </td>
                        <td class="text-sm font-medium text-gray-600"> &nbsp; : {{ $siswa->nik }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/4 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-book-open-check">
                                    <path d="M8 3H2v15h7c1.7 0 3 1.3 3 3V7c0-2.2-1.8-4-4-4Z" />
                                    <path d="m16 12 2 2 4-4" />
                                    <path d="M22 6V3h-6c-2.2 0-4 1.8-4 4v14c0-1.7 1.3-3 3-3h7v-2.3" />
                                </svg>
                                <span>KET</span>
                            </div>
                        </td>
                        <td class="mt-1 text-sm font-medium text-gray-600"> &nbsp; :
                            <span
                                class="inline-flex items-center px-3 py-1 text-xs font-medium {{ $existingAbsensi ? ' text-green-800 bg-green-100 ' : ' text-red-800 bg-red-100 ' }} rounded-full">
                               {{ $existingAbsensi ? 'SUDAH ABSEN' : 'BELUM ABSEN' }}
                            </span>

                        </td>
                    </tr>
                </table>

            </div>
        </div>

    </div>


    <div class="flex flex-col my-4">
        <div class="-m-1.5">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div class="border rounded dark:border-neutral-700">
                    <div class="grid grid-cols-3 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-6">
                        <button id="openCameraBtn"
                            class="flex flex-col items-center justify-center w-full h-full p-4 rounded-md shadow hover:border hover:border-blue-500">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-camera">
                                    <path
                                        d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z" />
                                    <circle cx="12" cy="13" r="3" />
                                </svg>
                            </div>
                            <p class="text-sm font-medium truncate">KAMERA</p>
                        </button>

                        <button id="openQr" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="hs-static-backdrop-modal" data-hs-overlay="#hs-static-backdrop-modal"
                            class="flex flex-col items-center justify-center w-full h-full p-4 rounded-md shadow hover:border hover:border-blue-500">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
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
                            <p class="text-sm font-medium truncate">KODE QR</p>
                        </button>

                        <form action="{{ route('siswa.location') }}" method="post" id="loginForm">
                            @csrf
                            <button id="submitButton" type="button"
                                class="flex flex-col items-center justify-center w-full h-full p-4 rounded-md shadow hover:border hover:border-blue-500">
                                <div class="flex items-center justify-center w-10 h-10 mb-2">
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
                                <p class="text-sm font-medium truncate">CARI LOKASI</p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="flex flex-col lg:flex-row w-full h-80">
        <!-- Card pertama -->
        <div class="flex-1 p-8 mt-6 text-gray-800 shadow bg-gray-50">
            <h2
                class="flex items-center p-3 mb-2 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-map-pinned">
                    <path
                        d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                    <circle cx="12" cy="8" r="2" />
                    <path
                        d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                </svg>
                <span class="ml-2">LOKASI SEKOLAH</span>
            </h2>
            <div class="h-full">
                <!-- Peta pertama -->
                <iframe id="map1" class="w-full h-44"
                    src="https://www.google.com/maps?q={{ $lembaga->latitude }}, {{ $lembaga->longitude }}&z=15&output=embed"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
        </div>

        <!-- Card kedua -->
        <div class="flex-1 p-8 mt-6 text-gray-800 shadow bg-gray-50">
            <h2
                class="flex items-center p-3 mb-2 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-map-pin-house">
                    <path
                        d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
                    <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
                    <path d="M18 22v-3" />
                    <circle cx="10" cy="10" r="3" />
                </svg>
                <span class="ml-2">LOKASI ANDA</span>
            </h2>
            <div class="h-full">
                <!-- Peta kedua -->
                @if (!$meta_siswa)
                    <span class="inline-flex justify-center items-center w-full h-full font-semibold">
                        lokasi belum ditemukan
                    </span>
                @else
                    <iframe id="map2" class="w-full h-44"
                        src="https://www.google.com/maps?q={{ $meta_siswa->latitude }}, {{ $meta_siswa->longitude }}&z=15&output=embed"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
                @endif
            </div>
        </div>
    </div>




    <!-- Reader Modal -->
    <div id="readerModal" class="fixed inset-0 z-50  items-center justify-center hidden bg-black bg-opacity-50">
        <div class="p-5 bg-white rounded-lg">
            <div id="reader" style="width: 100%" class="rounded-md "></div>
            <button id="closeReader" class="px-4 py-2 mt-3 text-white bg-red-500 rounded-md">Close</button>
        </div>
    </div>

    <!-- Qr Modal -->
    <div id="hs-static-backdrop-modal"
        class="hs-overlay [--overlay-backdrop:static] hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div
                class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        ID : {{ $siswa->nik }}
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-static-backdrop-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="mt-1 text-gray-800 dark:text-neutral-400 justify-center flex text-center">
                        {!! $qrCode !!}
                    </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
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
@endpush
