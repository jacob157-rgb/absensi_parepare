@extends('layouts.guru')
@section('content')
    <div class="lg:flex lg:space-x-6">
        <div class="mt-6 w-full bg-gray-50 p-8 text-gray-800 shadow sm:flex sm:space-x-6">
            <div class="mb-6 flex h-44 w-full flex-shrink-0 items-center justify-center sm:mb-0 sm:h-32 sm:w-32">
                <img src="{{ asset('assets/img/student.png') }}" alt=""
                    class="aspect-square h-full w-auto rounded bg-gray-100 object-contain">
            </div>
            <div class="flex flex-col space-y-4">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $guru->nama }}</h2>
                </div>
                <table class="w-full">
                    <tr>
                        <td class="w-1/4 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-id-card">
                                    <path d="M16 10h2" />
                                    <path d="M16 14h2" />
                                    <path d="M6.17 15a3 3 0 0 1 5.66 0" />
                                    <circle cx="9" cy="11" r="2" />
                                    <rect x="2" y="5" width="20" height="14" rx="2" />
                                </svg>
                                <span>NIK/NIP</span>
                            </div>
                        </td>
                        <td class="text-sm font-medium text-gray-600"> &nbsp; : {{ $guru->nik_nip }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/4 align-top text-sm font-medium text-gray-600">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-calendar-check-2">
                                    <path d="M8 2v4" />
                                    <path d="M16 2v4" />
                                    <path d="M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8" />
                                    <path d="M3 10h18" />
                                    <path d="m16 20 2 2 4-4" />
                                </svg>
                                <span>Jadwal Piket</span>
                            </div>
                        </td>
                        <td class="mt-1 text-sm font-medium text-gray-600"> &nbsp; :
                            @foreach ($jadwal_piket as $item)
                                <span
                                    class="dark:bg-white/10 dark:text-white inline-flex items-center gap-x-1.5 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-800">{{ $item->hari }}</span>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
