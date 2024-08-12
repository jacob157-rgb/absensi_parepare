<!-- Desktop sidebar -->
@php
    $isLembaga = App\Models\Sekolah::isLembaga();
    $roles = metaData();
@endphp
<aside class="z-20 hidden w-64 flex-shrink-0 overflow-y-auto bg-white dark:bg-gray-800 md:block">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/admin/beranda">
            @if ($roles['roles'] == 'MASTER')
                MASTER ABSENSI
            @else
                {{ $isLembaga->nama }}
            @endif
        </a>
        <ul class="mt-6">

            <li class="relative space-y-4 px-6 py-3">
                @if ('' == 'Dashboard')
                    <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-purple-600"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/admin/beranda">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/admin/tahun_ajaran">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-calendar-check  h-5 w-5">
                        <path d="M8 2v4" />
                        <path d="M16 2v4" />
                        <rect width="18" height="18" x="3" y="4" rx="2" />
                        <path d="M3 10h18" />
                        <path d="m9 16 2 2 4-4" />
                    </svg>
                    <span class="ml-4">Tahun Ajaran</span>
                </a>
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/admin/semester">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-graduation-cap h-5 w-5">
                        <path
                            d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
                        <path d="M22 10v6" />
                        <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
                    </svg>
                    <span class="ml-4">Semester</span>
                </a>
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/dashboard">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Kalender Akademik</span>
                </a>
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/dashboard">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Jam Absen</span>
                </a>
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/dashboard">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Jam Kerja</span>
                </a>
                <a class="inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:text-gray-100 dark:hover:text-gray-200"
                    href="/dashboard">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Jadwal Piket Guru</span>
                </a>
            </li>

        </ul>


    </div>
</aside>
