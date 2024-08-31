<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-blue-600 dark:text-blue-300">
        <!-- Mobile hamburger -->
        <button class="p-1 mr-5 -ml-1 rounded-md focus:shadow-outline-blue focus:outline-none md:hidden"
            @click="toggleSideMenu" aria-label="Menu">
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="flex justify-center flex-1 lg:mr-32"></div>

        <ul class="flex items-center flex-shrink-0 space-x-4">
            <!-- Theme toggler -->
            <li class="flex">
                <button type="button"
                    class="block font-medium text-gray-800 rounded-full hs-dark-mode dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hs-dark-mode-active:hidden"
                    data-hs-theme-click-value="dark">
                    <span class="inline-flex items-center justify-center size-9 group shrink-0">
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                        </svg>
                    </span>
                </button>
                <button type="button"
                    class="hidden font-medium text-gray-800 rounded-full hs-dark-mode dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none hs-dark-mode-active:block"
                    data-hs-theme-click-value="light">
                    <span class="inline-flex items-center justify-center size-9 group shrink-0">
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2"></path>
                            <path d="M12 20v2"></path>
                            <path d="m4.93 4.93 1.41 1.41"></path>
                            <path d="m17.66 17.66 1.41 1.41"></path>
                            <path d="M2 12h2"></path>
                            <path d="M20 12h2"></path>
                            <path d="m6.34 17.66-1.41 1.41"></path>
                            <path d="m19.07 4.93-1.41 1.41"></path>
                        </svg>
                    </span>
                </button>
            </li>
            @php
                $roles = metaData();
            @endphp
            <!-- Profile menu -->
            <li class="relative">
                <button class="align-middle rounded-full focus:shadow-outline-blue focus:outline-none"
                    @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account"
                    aria-haspopup="true">
                    @if ($roles['roles'] == 'MASTER')
                        <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('assets/img/kemenag.png') }}"
                            alt="" aria-hidden="true" />
                    @else
                        <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('assets/img/man2pare.png') }}"
                            alt="" aria-hidden="true" />
                    @endif

                </button>
                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" {{-- bug on clickaway @click.away="closeProfileMenu" --}} @keydown.escape="closeProfileMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                        aria-label="submenu">
                        @if ($roles['roles'] == 'MASTER')
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:bg-gray-100 hover:text-gray-800"
                                    href="/admin/profile">
                                    <div
                                        class="flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 bg-transparent rounded-md dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:bg-gray-100 hover:text-gray-800">
                                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        <span>Profile</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                        <li class="flex">
                            <form method="POST" action="{{ route('admin.logout') }}" id="logout-form"
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
