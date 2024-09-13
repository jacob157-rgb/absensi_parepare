<!-- Desktop sidebar -->
@php
    $siswa = App\Models\Siswa::authSiswa();
@endphp
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
    <a class="flex items-center py-4 ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
        href="{{ route('siswa.beranda') }}">
        <img class="h-[36px] w-[36px] rounded-full object-cover" src="{{ asset('assets/img/kemenag.png') }}" alt=""
            aria-hidden="true" />
        <span class="ps-2">{{ $siswa->nama }}</span>
    </a>
    <div class="py-2 ">
        <ul class="space-y-2">
            <li class="relative flex items-center ">
                <div class="relative flex items-center space-x-4 w-full p-3 mt-2 rounded-e-full border">
                    <img src="{{ asset('assets/img/student.png') }}" alt=""
                        class="w-12 h-12 bg-center bg-cover shadow-2xl  rounded-full bg-white">
                    <div>
                        <p class="text-lg font-semibold uppercase">{{ $siswa->nama }}</p>
                        <p
                            class="nline-flex items-center px-2 py-1 text-xs font-medium  text-blue-800 bg-blue-100  rounded-full">
                            NIK : {{ $siswa->nik }}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</aside>
