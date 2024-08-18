<!-- Desktop sidebar -->
@php
    $isLembaga = App\Models\Sekolah::isLembaga();
    $roles = metaData();
@endphp
<aside class="dark:bg-gray-800 z-20 hidden w-64 flex-shrink-0 overflow-y-auto bg-white md:block">
    <a class="dark:text-gray-200 ml-6 flex items-center py-4 text-lg font-bold text-gray-800" href="/admin/beranda">
        @if ($roles['roles'] == 'MASTER')
            <img class="h-[36px] w-[36px] rounded-full object-cover" src="{{ asset('assets/img/kemenag.png') }}"
                alt="" aria-hidden="true" />
            <span class="ps-2">MASTER ABSENSI</span>
        @else
            <img class="h-[36px] w-[36px] rounded-full object-cover" src="{{ asset('assets/img/man2pare.png') }}"
                alt="" aria-hidden="true" />
            <span class="ps-2"> {{ $isLembaga->nama }}</span>
        @endif
    </a>
    <div class="dark:text-gray-400 py-2 text-gray-500">
        <ul class="space-y-2">
            <li class="relative flex items-center px-6 py-3">
                @if (request()->routeIs('beranda'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                        aria-hidden="true"></span>
                @endif
                <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                    href="/admin/beranda">
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            @if ($roles['roles'] == 'MASTER')
                <li class="relative flex items-center px-6 py-3">
                    @if (request()->routeIs('tahun_ajaran.*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                            aria-hidden="true"></span>
                    @endif
                    <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                        href="/admin/tahun_ajaran">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-calendar-check h-5 w-5">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <rect width="18" height="18" x="3" y="4" rx="2" />
                            <path d="M3 10h18" />
                            <path d="m9 16 2 2 4-4" />
                        </svg>
                        <span class="ml-4">Tahun Ajaran</span>
                    </a>
                </li>
                <li class="relative flex items-center px-6 py-3">
                    @if (request()->routeIs('semester.*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                            aria-hidden="true"></span>
                    @endif
                    <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
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
                </li>
            @endif
            <li class="relative flex items-center px-6 py-3">
                @if (request()->routeIs('lembaga.*'))
                    <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                        aria-hidden="true"></span>
                @endif
                <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                    href="/admin/lembaga">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-school h-5 w-5">
                        <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                        <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                        <path d="M18 5v17" />
                        <path d="m4 6 8-4 8 4" />
                        <path d="M6 5v17" />
                        <circle cx="12" cy="9" r="2" />
                    </svg>
                    <span class="ml-4">Lembaga</span>
                </a>
            </li>

            @if ($roles['roles'] == 'MASTER')
                <li class="relative flex items-center px-6 py-3">
                    @if (request()->routeIs('jam_kerja.*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                            aria-hidden="true"></span>
                    @endif
                    <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                        href="/admin/jam_kerja">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-clock h-5 w-5">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span class="ml-4">Jam Kerja</span>
                    </a>
                </li>
                <li class="relative flex items-center px-6 py-3">
                    @if (request()->routeIs('kalender_akademik.*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                            aria-hidden="true"></span>
                    @endif
                    <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                        href="/admin/kalender_akademik">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-calendar-x  h-5 w-5">
                            <path d="M8 2v4" />
                            <path d="M16 2v4" />
                            <rect width="18" height="18" x="3" y="4" rx="2" />
                            <path d="M3 10h18" />
                            <path d="m14 14-4 4" />
                            <path d="m10 14 4 4" />
                        </svg>
                        <span class="ml-4">Kalender Akademik</span>
                    </a>
                </li>
            @endif

            @if ($roles['roles'] == 'LEMBAGA')
                <li class="relative flex items-center px-6 py-3">
                    @if (request()->routeIs('kelas.*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                            aria-hidden="true"></span>
                    @endif
                    <a class="dark:text-gray-100 dark:hover:text-gray-200 inline-flex w-full items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                        href="/admin/kelas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-shapes h-5 w-5">
                            <path
                                d="M8.3 10a.7.7 0 0 1-.626-1.079L11.4 3a.7.7 0 0 1 1.198-.043L16.3 8.9a.7.7 0 0 1-.572 1.1Z" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <circle cx="17.5" cy="17.5" r="3.5" />
                        </svg>
                        <span class="ml-4">Kelas</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    @if (request()->routeIs('guru.*'))
                        <span class="absolute inset-y-0 left-0 w-1 rounded-br-lg rounded-tr-lg bg-blue-600"
                            aria-hidden="true"></span>
                    @endif
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold text-black transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="togglePagesMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            <span class="ml-4">Data Guru</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isPagesMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium  border-l-2 border-blue-500 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="/admin/guru">Guru</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="/admin/jadwal_piket">Jadwal Piket </a>
                            </li>
                        </ul>
                    </template>
                </li>
            @endif
        </ul>
    </div>
</aside>
