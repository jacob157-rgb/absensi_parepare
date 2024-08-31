<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
    @stack('addon-style')
</head>

<body>
    <div class="dark:bg-gray-900 flex h-screen bg-gray-50 overflow-x-hidden" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- Desktop sidebar --}}
        @include('includes.desktop-sidebar-siswa')

        {{-- Mobile sidebar --}}
        {{--  @include('includes.mobile-sidebar')  --}}

        <div class="flex w-full flex-1 flex-col overflow-x-hidden">
            @include('includes.header')
            <main class="h-full overflow-x-auto overflow-y-auto">
                <div class="container mx-auto px-6">
                    <section
                        class="focus:shadow-outline-blue my-6 flex items-center justify-between rounded bg-blue-600 p-4 text-sm font-semibold text-white shadow-md focus:outline-none">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-book-open-check mr-2">
                                <path d="M8 3H2v15h7c1.7 0 3 1.3 3 3V7c0-2.2-1.8-4-4-4Z" />
                                <path d="m16 12 2 2 4-4" />
                                <path d="M22 6V3h-6c-2.2 0-4 1.8-4 4v14c0-1.7 1.3-3 3-3h7v-2.3" />
                            </svg>
                            <span>
                                {{ $pages }}
                            </span>
                        </div>
                    </section>

                    @yield('content')
                </div>
            </main>
        </div>
    </div>


    @stack('addon-script')

    @include('components.confrm_session')
</body>

</html>
