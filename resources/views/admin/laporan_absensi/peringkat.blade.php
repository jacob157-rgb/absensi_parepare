@extends('layouts.admin')
@section('content')
    {{--  laporan pertanggal  --}}
    <div class="w-full lg:overflow-visible overflow-hidden rounded border bg-white p-4">
        <span class="font-semibold mx-4">PERINGKAT KEHADIRAN SISWA</span>
        <form action="" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
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
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Bulan</span>
                <input type="month" name="month" id="month" value="{{ request('month') }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                    placeholder="Berikan Alasannya" />
            </label>
            <label class="block text-sm lg:mt-8 mt-2">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded shadow-inner active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-filter">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                    </svg>
                    <span class="ms-2"> Filter</span>
                </button>
            </label>
        </form>
    </div>


    @if (request()->query('month'))
        <div class="flex flex-col my-4">
            <div class="w-full overflow-x-auto border border-r">
                <table class="whitespace-no-wrap search-table w-full min-w-full">
                    <thead>
                        <tr
                            class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                            <th class="px-4 py-3 truncate">No.</th>
                            <th class="px-4 py-3 truncate">Nama Siswa</th>
                            <th class="px-4 py-3 truncate">Total Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                        @foreach ($siswa as $row)
                            <tr class="dark:text-gray-400 text-gray-700">
                                <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                                    {{ $loop->iteration }}.
                                </td>
                                <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                                    {{ $row['nama'] }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $row['total_kehadiran'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    @endif
@endsection
