<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
    @stack('addon-style')
</head>

<body>
    <div class="flex h-screen overflow-x-hidden dark:bg-gray-900 bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- Desktop sidebar --}}
        @include('includes.desktop-sidebar')

        {{-- Mobile sidebar --}}
        @include('includes.mobile-sidebar')

        <div class="flex flex-col flex-1 w-full overflow-x-hidden">
            @include('includes.header')
            <main class="h-full overflow-x-auto overflow-y-auto">
                <div class="container px-6 mx-auto">
                    <section
                        class="flex items-center justify-between p-4 my-6 text-sm font-semibold text-white bg-blue-600 rounded shadow-md focus:shadow-outline-blue focus:outline-none">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mr-2 lucide lucide-book-open-check">
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
</body>

</html>
