<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    @include('components.meta')
    <title>{{ $pages }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- favicon --}}
    <link rel="icon" sizes="180x180" href="{{ asset('assets/img/favicon.ico') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('style')
</head>

<body>
    <div class="dark:bg-gray-900 flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{--  desktop sidebar  --}}
        @include('includes.desktop-sidebar')

        {{--   Mobile sidebar   --}}
        @include('includes.mobile-sidebar')

        <div class="flex w-full flex-1 flex-col">
            @include('includes.header')
            <main class="h-full overflow-y-auto">
                <div class="container mx-auto grid px-6">

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

    <script src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('global-search');
            const tables = document.querySelectorAll('.search-table');

            searchInput.addEventListener('keyup', function() {
                const searchTerm = searchInput.value.toLowerCase();

                tables.forEach(function(table) {
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(function(row) {
                        const cells = row.querySelectorAll('td');
                        let rowText = '';

                        cells.forEach(function(cell) {
                            rowText += cell.textContent.toLowerCase() + ' ';
                        });

                        row.style.display = rowText.includes(searchTerm) ? '' : 'none';
                    });
                });
            });
        });
    </script>
    @include('components.confrm_session')
    @yield('script')
</body>

</html>
