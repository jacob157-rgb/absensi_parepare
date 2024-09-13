<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-blue-600 dark:text-blue-300">
        @php
            $siswa = App\Models\Siswa::authSiswa();
        @endphp
        {{--  menu mobile  --}}
        <div class="hs-dropdown relative inline-flex  md:hidden">
            <button id="hs-dropdown-custom-trigger" type="button"
                class="hs-dropdown-toggle py-1 ps-1 pe-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <img class="w-8 h-auto rounded-full" src="{{ asset('assets/img/student.png') }}" alt="Avatar">
                <span
                    class="text-gray-600 font-medium truncate max-w-[7.5rem] dark:text-neutral-400">{{ $siswa->nama }}</span>
                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-custom-trigger">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="{{ route('siswa.beranda') }}">
                    Beranda
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="{{ route('siswa.absen') }}">
                    Absen
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="{{ route('siswa.perizinan') }}">
                    Perizinan
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="{{ route('siswa.detail_absensi') }}">
                    Absensiku
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                    href="{{ route('siswa.live') }}">
                    Live
                </a>
            </div>
        </div>

        <div class="flex justify-center flex-1 lg:mr-32"></div>

        <ul class="flex items-center flex-shrink-0 space-x-4">

            @php
                $roles = metaData();
            @endphp
            <!-- Profile menu -->
            <li class="relative">
                <button class="align-middle rounded-full focus:shadow-outline-blue focus:outline-none"
                    @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                    aria-haspopup="true">

                    <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('assets/img/man2pare.png') }}"
                        alt="" aria-hidden="true" />

                </button>
                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" {{-- bug on clickaway @click.away="closeProfileMenu" --}} @keydown.escape="closeProfileMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                        aria-label="submenu">
                        <li class="flex">
                            <form method="POST" action="{{ route('logout') }}" id="logout-form"
                                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:bg-gray-100 hover:text-gray-800">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 bg-transparent rounded-md dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:bg-gray-100 hover:text-gray-800">
                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>Log out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</header>
