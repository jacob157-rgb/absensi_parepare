@extends('layouts.admin')
@section('content')
    {{--  warning  --}}
    <div class="bg-green-50 border mb-5 border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/10 dark:border-green-900 dark:text-green-500"
        role="alert" tabindex="-1" aria-labelledby="hs-with-list-label">
        <div class="flex">
            <div class="shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-info shrink-0 size-4 mt-0.5">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 16v-4" />
                    <path d="M12 8h.01" />
                </svg>
            </div>
            <div class="ms-4">
                <h3 id="hs-with-list-label" class="text-sm font-semibold">
                    Petunjuk
                </h3>
                <div class="mt-2 text-sm text-green-700 dark:text-green-400">
                    <ul class="list-disc space-y-1 ps-5">
                        <li>
                            Pilih kelas dan tanggal untuk mencetak laporan absensi siswa.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    {{--  laporan pertanggal  --}}
    <div class="w-full lg:overflow-visible overflow-hidden rounded border bg-white p-4">
        <span class="font-semibold mx-4">LAPORAN PERTANGGAL</span>
        <form action="{{ route('cetak.pertanggal') }}" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Kelas</span>
                <select id="kelas" name="kelas"
                    data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "Search...",
                                    "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                    "placeholder": "Pilih kelas...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-64 cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-64 bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-64 text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>"
                                }'
                    class="hidden" name="kelas">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" {{ request('kelas') == $item->id ? 'selected' : '' }}>
                            - Kelas {{ $item->tingkat_kelas }} {{ $item->kelompok }} ( {{ $item->urusan_kelas }}
                            ) ( jurusan
                            {{ $item->jurusan }} )
                        </option>
                    @endforeach
                </select>
                @error('kelas')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>

            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Tanggal</span>
                <input type="date" name="date" id="date" value="{{ request('date') }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                    placeholder="Berikan Alasannya" />
            </label>
            <label class="block text-sm lg:mt-8 mt-2">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded shadow-inner active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-printer-check">
                        <path d="M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5" />
                        <path d="m16 19 2 2 4-4" />
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2" />
                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                    </svg>

                    <span class="ms-2"> Cetak PDF</span>
                </button>
            </label>
        </form>
    </div>

    {{--  laporan persiswa  --}}
    <div class="w-full lg:overflow-visible overflow-hidden rounded border bg-white p-4 mt-5">
        <span class="font-semibold mx-4">LAPORAN PERSISWA</span>
        <form action="{{ route('cetak.persiswa') }}" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Kelas</span>
                <select id="kelas" name="kelas"
                    data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "Search...",
                                    "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                    "placeholder": "Pilih kelas...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-64 cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-64 bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-64 text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>"
                                }'
                    class="hidden" name="kls">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" {{ request('kelas') == $item->id ? 'selected' : '' }}>
                            - Kelas {{ $item->tingkat_kelas }} {{ $item->kelompok }} ( {{ $item->urusan_kelas }}
                            ) ( jurusan
                            {{ $item->jurusan }} )
                        </option>
                    @endforeach
                </select>
                @error('kelas')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Siswa</span>
                <select id="siswa" name="siswa"
                    data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "Search...",
                                    "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                    "placeholder": "Pilih siswa...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-64 cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-64 bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-64 text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>"
                                }'
                    class="hidden" name="siswa">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}" {{ request('siswa') == $item->id ? 'selected' : '' }}>
                            - {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                @error('siswa')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Bulan/Tahun</span>
                <input type="month" name="month" id="month" value="{{ request('month') }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none" />
            </label>
            <label class="block text-sm lg:mt-8 mt-2">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded shadow-inner active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-printer-check">
                        <path d="M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5" />
                        <path d="m16 19 2 2 4-4" />
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2" />
                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                    </svg>

                    <span class="ms-2"> Cetak PDF</span>
                </button>
            </label>
        </form>
    </div>

    {{--  laporan perhari  --}}
    <div class="w-full lg:overflow-visible overflow-hidden rounded border bg-white p-4 my-5">
        <span class="font-semibold mx-4">LAPORAN PERHARI</span>
        <form action="{{ route('cetak.perhari') }}" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Kelas</span>
                <select id="kelas" name="kelas"
                    data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "Search...",
                                    "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                    "placeholder": "Pilih kelas...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-64 cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-64 bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-64 text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>"
                                }'
                    class="hidden" name="kls">
                    <option value="" disabled selected>Pilih Kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" {{ request('kelas') == $item->id ? 'selected' : '' }}>
                            - Kelas {{ $item->tingkat_kelas }} {{ $item->kelompok }} ( {{ $item->urusan_kelas }}
                            ) ( jurusan
                            {{ $item->jurusan }} )
                        </option>
                    @endforeach
                </select>
                @error('kelas')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>

            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Bulan/Tahun</span>
                <input type="month" name="month" id="month" value="{{ request('month') }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none" />
            </label>
            <label class="block text-sm lg:mt-8 mt-2">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded shadow-inner active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-printer-check">
                        <path d="M13.5 22H7a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v.5" />
                        <path d="m16 19 2 2 4-4" />
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v2" />
                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6" />
                    </svg>

                    <span class="ms-2"> Cetak PDF</span>
                </button>
            </label>
        </form>
    </div>
@endsection
