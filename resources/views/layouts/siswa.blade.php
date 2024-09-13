<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
    @stack('addon-style')
</head>

<body>
    <div class="flex h-screen overflow-x-hidden dark:bg-gray-900 bg-gray-50"
        :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- Desktop sidebar --}}
        @include('includes.desktop-sidebar-siswa')

        {{-- Mobile sidebar --}}
        {{--  @include('includes.mobile-sidebar-siswa')  --}}

        <div class="flex flex-col flex-1 w-full overflow-x-hidden">
            @include('includes.header-siswa')
            <main class="h-full overflow-x-auto overflow-y-auto">
                <div class="container px-6 mx-auto">
                    <section
                        class="flex items-center justify-between p-4 my-6 text-sm font-semibold text-white uppercase bg-blue-600 rounded shadow-md focus:shadow-outline-blue focus:outline-none">
                        <div>
                            <span id="day"></span>,
                            <span id="date"></span> -
                            <span id="month"></span> -
                            <span id="year"></span>
                        </div>
                        <div>
                            <span id="hours"></span> :
                            <span id="minutes"></span> :
                            <span id="seconds"></span>
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
