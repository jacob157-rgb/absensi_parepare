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
                                class="inline-flex items-center px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-800/30 dark:text-red-500">Belum
                                Absen</span>

                        </td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="w-full max-w-md p-8 mt-6 text-gray-800 shadow lg:ms-5 bg-gray-50 sm:flex sm:space-x-6">
            <div class="flex flex-col space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold">JAM ABSEN HARI {{ $jam_absen?->hari }}</h2>
                </div>
                <table class="w-full">

                    <tr>
                        <td class="w-1/4 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clock-arrow-up">
                                    <path d="M13.228 21.925A10 10 0 1 1 21.994 12.338" />
                                    <path d="M12 6v6l1.562.781" />
                                    <path d="m14 18 4-4 4 4" />
                                    <path d="M18 22v-8" />
                                </svg>
                                <span>JAM ABSEN MASUK</span>
                            </div>
                        </td>
                        <td class="text-sm font-medium text-gray-600"> &nbsp; :
                            {{ \Carbon\Carbon::parse($jam_absen?->jam_masuk)->format('H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/4 text-sm font-medium text-gray-600 align-top">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clock-arrow-down">
                                    <path d="M12.338 21.994A10 10 0 1 1 21.925 13.227" />
                                    <path d="M12 6v6l2 1" />
                                    <path d="m14 18 4 4 4-4" />
                                    <path d="M18 14v8" />
                                </svg>
                                <span>JAM ABSEN TERLAMBAT</span>
                            </div>
                        </td>
                        <td class="text-sm font-medium text-gray-600"> &nbsp; :
                            {{ \Carbon\Carbon::parse($jam_absen?->jam_terlambat)->format('H:i:s') }}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>

    <div class="flex flex-col my-4">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
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
                        <thead class="bg-gray-50 dark:bg-neutral-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                                    JAM ABSENSI</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start dark:text-neutral-500">
                                    KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <tr>

                                <td
                                    class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-neutral-200">
                                    John Brown</td>
                                <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-neutral-200">45</td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col my-4">
        <div class="-m-1.5 ">
            <div class="p-1.5 min-w-full inline-block align-middle">
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
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout">
                                    <rect width="7" height="7" x="3" y="3" rx="1" />
                                    <rect width="7" height="7" x="14" y="3" rx="1" />
                                    <rect width="7" height="7" x="14" y="14" rx="1" />
                                    <rect width="7" height="7" x="3" y="14" rx="1" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">01</p>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 14.5 8" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">02</p>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                    <polygon
                                        points="12 2 15 8.09 21 8.09 16.5 12.5 18.18 18.09 12 14.55 5.82 18.09 7.5 12.5 3 8.09 9 8.09 12 2" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">03</p>
                        </div>

                        <!-- Card 4 -->
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
                                    <path d="M20 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M4 21v-2a4 4 0 0 1 3-3.87" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">04</p>
                        </div>

                        <!-- Card 5 -->
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout">
                                    <rect width="7" height="7" x="3" y="3" rx="1" />
                                    <rect width="7" height="7" x="14" y="3" rx="1" />
                                    <rect width="7" height="7" x="14" y="14" rx="1" />
                                    <rect width="7" height="7" x="3" y="14" rx="1" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">05</p>
                        </div>

                        <!-- Card 6 -->
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 14.5 8" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">06</p>
                        </div>

                        <!-- Card 7 -->
                        <div
                            class="flex flex-col items-center justify-center p-4 text-white bg-purple-500 rounded-md shadow">
                            <div class="flex items-center justify-center w-10 h-10 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star">
                                    <polygon
                                        points="12 2 15 8.09 21 8.09 16.5 12.5 18.18 18.09 12 14.55 5.82 18.09 7.5 12.5 3 8.09 9 8.09 12 2" />
                                </svg>
                            </div>
                            <p class="text-xl font-bold">07</p>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
