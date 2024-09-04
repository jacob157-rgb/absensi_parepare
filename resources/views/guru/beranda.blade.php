@extends('layouts.guru')
@section('content')
    <div class="flex flex-col justify-center space-y-2 lg:flex-row lg:space-x-2">
        <div class="w-full max-w-md p-8 text-gray-800 shadow bg-gray-50 sm:flex sm:space-x-6">
            <div class="flex items-center justify-center flex-shrink-0 w-full mb-6 h-44 sm:mb-0 sm:h-32 sm:w-32">
                <img src="{{ asset('assets/img/student.png') }}" alt=""
                    class="object-contain w-auto h-full bg-gray-100 rounded aspect-square">
            </div>
            <div class="flex flex-col items-center justify-center w-full">
                <div class="w-full pb-5">
                    <h2 class="text-2xl font-semibold">{{ $guru->nama }}</h2>
                </div>
                <table class="w-full">
                    <tr class="w-full">
                        <td class="w-full py-1 text-sm font-medium text-gray-600 align-top">
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
                                <span class="w-1/4 pr-0 mr-0">NIK/NIP </span>:
                                {{ $guru->nik_nip }}<br />
                            </div>
                        </td>
                    </tr>
                    <tr class="w-full">
                        <td class="w-full py-1 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-book-open-check">
                                    <path d="M8 3H2v15h7c1.7 0 3 1.3 3 3V7c0-2.2-1.8-4-4-4Z" />
                                    <path d="m16 12 2 2 4-4" />
                                    <path d="M22 6V3h-6c-2.2 0-4 1.8-4 4v14c0-1.7 1.3-3 3-3h7v-2.3" />
                                </svg>

                                <span class="w-1/4 pr-0 mr-0">STATUS ABSEN </span>: @if ($status_absen)
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full text-nowrap dark:bg-green-800/30 dark:text-green-500">Aktif</span><br />
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full text-nowrap dark:bg-red-800/30 dark:text-red-500">Tidak
                                        Aktif</span><br />
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="w-full">
                        <td class="w-full py-1 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <div>
                                    <span class="w-1/4 pr-0 mr-0">JADWAL PIKET </span>: @foreach ($jadwal_piket as $row)
                                        <span
                                            class="dark:bg-white/10 dark:text-white inline-flex items-center gap-x-1.5 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-800">{{ $row->hari }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="w-full max-w-md p-8 text-gray-800 shadow bg-gray-50 sm:flex sm:space-x-6">
            <div class="flex flex-col w-full">
                <div class="w-full pb-5">
                    <h2 class="text-2xl font-semibold">JAM ABSEN HARI {{ $jam_absen?->hari ?? 'LIBUR' }}</h2>
                </div>
                <table class="w-full">
                    <tr class="w-full">
                        <td class="w-full py-1 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clock-arrow-up">
                                    <path d="M13.228 21.925A10 10 0 1 1 21.994 12.338" />
                                    <path d="M12 6v6l1.562.781" />
                                    <path d="m14 18 4-4 4 4" />
                                    <path d="M18 22v-8" />
                                </svg>
                                <span class="w-1/2 pr-0 mr-0">JAM ABSEN MASUK </span>: @if ($jam_absen)
                                    {{ \Carbon\Carbon::parse($jam_absen?->jam_masuk)->format('H:i:s') }}<br />
                                @else
                                    -<br />
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="w-full">
                        <td class="w-full py-1 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clock-arrow-down">
                                    <path d="M12.338 21.994A10 10 0 1 1 21.925 13.227" />
                                    <path d="M12 6v6l2 1" />
                                    <path d="m14 18 4 4 4-4" />
                                    <path d="M18 14v8" />
                                </svg>
                                <span class="w-1/2 pr-0 mr-0">JAM ABSEN TERLAMBAT </span>: @if ($jam_absen)
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

    <div class="grid grid-cols-2 gap-4 mt-5">
        <!-- Card -->
        <button id="openCameraBtn"
            class="flex flex-col items-center justify-center text-center bg-white border shadow-sm dark:border-neutral-700 dark:bg-neutral-800 rounded-xl"
            @if (!$status_absen) disabled @endif>
            <div class="p-4 md:p-5">
                <div class="flex items-center justify-center gap-x-2">
                    <p class="text-xs tracking-wide text-black uppercase dark:text-neutral-500">
                        Absen Siswa
                    </p>
                </div>
            </div>
        </button>
        <!-- End Card -->

        <!-- Card -->
        <button
            class="flex flex-col items-center justify-center text-center bg-white border shadow-sm dark:border-neutral-700 dark:bg-neutral-800 rounded-xl">
            <div class="p-4 md:p-5">
                <div class="flex items-center justify-center gap-x-2">
                    <p class="text-xs tracking-wide text-black uppercase dark:text-neutral-500">
                        Lihat Riwayat Absen
                    </p>
                </div>
            </div>
        </button>
        <!-- End Card -->
    </div>

    @if ($status_absen)
        <!-- Reader Modal -->
        <div id="readerModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-black bg-opacity-50">
            <div class="p-5 bg-white rounded-lg">
                <div id="reader" style="width: 500px" class="rounded-md "></div>
                <button id="closeReader" class="px-4 py-2 mt-3 text-white bg-red-500 rounded-md">Close</button>
            </div>
        </div>
    @endif


    <form id="absenForm" action="{{ route('guru.storeAbsen') }}" method="POST">
        @csrf
        <input type="hidden" name="nik" id="nik_siswa">
        <input type="hidden" value="{{ $guru->id }}" name="guru_id">
        <button type="submit" id="submitButton" class="hidden">Submit</button>
    </form>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
