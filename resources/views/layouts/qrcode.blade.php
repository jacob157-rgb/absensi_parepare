<!DOCTYPE html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
    @stack('addon-style')
</head>

<body>
    <div class="flex h-screen overflow-x-hidden dark:bg-gray-900 ">

        <div class="flex flex-col flex-1 w-full overflow-x-hidden">
            <main class="h-full overflow-x-auto overflow-y-auto ">
                <div class="w-full ">
                    @yield('content')
                </div>
            </main>

            @yield('section')
        </div>
    </div>


    @stack('addon-script')

    @include('components.confrm_session')

    
</body>

</html>
