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

    </div>

    
@endsection

@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
