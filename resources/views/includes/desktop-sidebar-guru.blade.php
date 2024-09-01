<!-- Desktop sidebar -->
@php
    $roles = Auth::guard('guru')->user();
@endphp
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
    <a class="flex items-center py-4 ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/admin/beranda">
        <img class="h-[36px] w-[36px] rounded-full object-cover" src="{{ asset('assets/img/kemenag.png') }}" alt=""
            aria-hidden="true" />
        <span class="ps-2">{{ $roles->nama }}</span>
    </a>
    <div class="py-2 text-gray-500 dark:text-gray-400">
        <ul class="space-y-2">
            <li class="relative flex items-center px-6 py-3">
                @if (request()->routeIs('beranda'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 dark:text-gray-100 dark:hover:text-gray-200 hover:text-gray-800"
                    href="{{ route('siswa.beranda') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
