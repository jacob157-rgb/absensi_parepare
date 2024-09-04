@extends('layouts.siswa')
@section('content')
    <div class="flex flex-col justify-center space-y-2 lg:flex-row lg:space-x-2">
        <div class="w-full max-w-md p-8 text-gray-800 shadow bg-gray-50 sm:flex sm:space-x-6">
            <div class="flex items-center justify-center flex-shrink-0 w-full mb-6 h-44 sm:mb-0 sm:h-32 sm:w-32">
                <img src="{{ asset('assets/img/student.png') }}" alt=""
                    class="object-contain w-auto h-full bg-gray-100 rounded aspect-square">
            </div>
            <div class="flex flex-col items-center justify-center w-full">
                <div class="w-full pb-5">
                    <h2 class="text-2xl font-semibold">{{ $siswa->nama }}</h2>
                </div>
                <table class="w-full">
                    <tr class="w-full">
                        <td class="w-full py-1 text-sm font-medium text-gray-600 align-top">
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

                                <span class="w-1/4 pr-0 mr-0">KELAS </span>:
                                {{ $siswa->kelas->tingkat_kelas }}
                                {{ $siswa->kelas->kelompok }} ( {{ $siswa->kelas->urusan_kelas }} ) jurusan
                                {{ $siswa->kelas->jurusan }}<br />
                            </div>
                        </td>
                    </tr>
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
                                <span class="w-1/4 pr-0 mr-0">NISN </span>:
                                {{ $siswa->nisn }}<br />
                            </div>
                        </td>
                    </tr>
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
                                <span class="w-1/4 pr-0 mr-0">NIK </span>:
                                {{ $siswa->nik }}<br />
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

                                <span class="w-1/4 pr-0 mr-0">KET </span>:
                                <span
                                    class="inline-flex items-center px-3 py-1 text-xs font-medium {{ $existingAbsensi ? ' text-green-800 bg-green-100 ' : ' text-red-800 bg-red-100 ' }} rounded-full">
                                    {{ $existingAbsensi ? 'SUDAH ABSEN' : 'BELUM ABSEN' }}
                                </span>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-clock-arrow-down">
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

    <div class="flex flex-col justify-center w-full space-y-2 lg:flex-row lg:space-x-2">
        <div class="inline-block min-w-full p-1.5 align-middle">
            <div class="overflow-hidden border rounded dark:border-neutral-700">
                <h2
                    class="flex items-center p-3 m-3 my-6 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-clock-1">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 14.5 8" />
                    </svg>
                    <span class="ml-2">ABSENSI ANDA HARI INI</span>
                </h2>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="dark:bg-neutral-700 bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500 text-start">
                                JAM ABSENSI</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500 text-start">
                                KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @php
                            $jamTerlambat = \Carbon\Carbon::parse($jam_absen?->jam_terlambat);
                            $tanggalAbsen = \Carbon\Carbon::parse($jamAbsen?->tanggal_absen);

                            $isLate = $tanggalAbsen->gt($jamTerlambat);
                            $selisih = $jamTerlambat->diffInMinutes($tanggalAbsen);
                        @endphp
                        <tr>
                            @if ($existingAbsensi)
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($jamAbsen?->tanggal_absen)->format('H:i:s') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                    @if ($isLate)
                                        <p>Terlambat {{ $selisih }} menit</p>
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
                            @else
                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                    -
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                    -
                                </td>
                            @endif

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="flex flex-col my-4">
        <div class="-m-1.5">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div class="border rounded dark:border-neutral-700">
                    <h2
                        class="flex items-center p-3 m-3 my-6 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-layout-grid">
                            <rect width="7" height="7" x="3" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="3" rx="1" />
                            <rect width="7" height="7" x="14" y="14" rx="1" />
                            <rect width="7" height="7" x="3" y="14" rx="1" />
                        </svg>
                        <span class="ml-2">MEGA MENU</span>
                    </h2>
                    <div class="grid grid-cols-3 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-8">
                        <a href="{{ route('siswa.absen') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-md shadow hover:border hover:border-blue-500">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <img src="{{ asset('assets/img/absen.png') }}" alt="" class="w-20">
                            </div>
                            <p class="text-sm font-medium">ABSEN</p>
                        </a>

                        <!-- Card 2 -->
                        <a href="{{ route('siswa.perizinan') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-md shadow hover:border hover:border-blue-500">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <img src="{{ asset('assets/img/perizinan.png') }}" alt="" class="w-20">
                            </div>
                            <p class="text-sm font-medium">PERIZINAN</p>
                        </a>

                        <!-- Card 3 -->
                        <a href="{{ route('siswa.detail_absensi') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-md shadow hover:border hover:border-blue-500">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <img src="{{ asset('assets/img/detail_absen.png') }}" alt="" class="w-20">
                            </div>
                            <p class="text-sm font-medium">ABSENSIKU</p>
                        </a>

                        <!-- Card 4 -->
                        <a href="{{ route('siswa.live') }}"
                            class="flex flex-col items-center justify-center p-4 rounded-md shadow hover:border hover:border-blue-500">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <img src="{{ asset('assets/img/live.png') }}" alt="" class="w-20">
                            </div>
                            <p class="text-sm font-medium">LIVE</p>
                        </a>



                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
