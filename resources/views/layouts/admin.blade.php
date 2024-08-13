<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
</head>

<body>
    <div class="flex h-screen dark:bg-gray-900 bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{--  desktop sidebar  --}}
        @include('includes.desktop-sidebar')

        {{--   Mobile sidebar   --}}
        @include('includes.mobile-sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('includes.header')
            <main class="h-full overflow-y-auto">
                <div class="container grid px-6 mx-auto">

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

        
        document.addEventListener('DOMContentLoaded', function() {
            const baseSelectConfig = {
                "hasSearch": true,
                "searchPlaceholder": "Search...",
                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-1",
                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-3 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
            };

            function applySelectConfig(selectElement, placeholder) {
                const config = {
                    ...baseSelectConfig,
                    "placeholder": placeholder
                };
                selectElement.setAttribute('data-hs-select', JSON.stringify(config));
            }

            document.querySelectorAll('.hs-select').forEach(select => {
                const placeholder = select.getAttribute('data-placeholder') || 'Choose';
                applySelectConfig(select, placeholder);
            });
        });
    </script>
    @include('components.confrm_session')
    @include('components.laravolt')
</body>

</html>
