<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
</head>

<body>
    <div class="flex h-screen dark:bg-gray-900 bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto">

                @yield('content')

            </main>
        </div>
    </div>

    @include('components.confrm_session')
</body>
<script src="{{ asset('assets/js/location.js') }}"></script>

</html>
