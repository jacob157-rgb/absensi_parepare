<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    @include('components.meta')
    <title>Judul</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    {{-- favicon --}}
    <link rel="icon" sizes="180x180" href="{{ asset('assets/img/windmill.png') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('style')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{--  desktop sidebar  --}}
        @include('includes.desktop-sidebar')

        {{--   Mobile sidebar   --}}
        @include('includes.mobile-sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('includes.header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <section
                        class="flex items-center justify-between p-4 my-6 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-book-open-check mr-2">
                                <path d="M8 3H2v15h7c1.7 0 3 1.3 3 3V7c0-2.2-1.8-4-4-4Z" />
                                <path d="m16 12 2 2 4-4" />
                                <path d="M22 6V3h-6c-2.2 0-4 1.8-4 4v14c0-1.7 1.3-3 3-3h7v-2.3" />
                            </svg>
                            <span>
                                Menunya
                            </span>
                        </div>
                    </section>

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    @include('components.confrm_session')
    @yield('script')
</body>

</html>
