@extends('layouts.admin')
@section('content')
    @php
        $roles = metaData();
    @endphp
    {{--  card count  --}}
    <section class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">


        <div class="flex items-center p-4 border bg-white rounded shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Siswa
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $siswa }}
                </p>
            </div>
        </div>


        <div class="flex items-center p-4 border bg-white rounded shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-graduation-cap w-5 h-5">
                    <path
                        d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
                    <path d="M22 10v6" />
                    <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Guru
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $guru }}
                </p>
            </div>
        </div>


        @if ($roles['roles'] == 'MASTER')
            <div class="flex items-center p-4 border bg-white rounded shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-orange-100 dark:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user-cog w-5 h-5">
                        <circle cx="18" cy="15" r="3" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                        <path d="m21.7 16.4-.9-.3" />
                        <path d="m15.2 13.9-.9-.3" />
                        <path d="m16.6 18.7.3-.9" />
                        <path d="m19.1 12.2.3-.9" />
                        <path d="m19.6 18.7-.4-1" />
                        <path d="m16.8 12.3-.4-1" />
                        <path d="m14.3 16.6 1-.4" />
                        <path d="m20.7 13.8 1-.4" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Admin
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $admin }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 border bg-white rounded shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-orange-100 dark:bg-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-school w-5 h-5">
                        <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                        <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                        <path d="M18 5v17" />
                        <path d="m4 6 8-4 8 4" />
                        <path d="M6 5v17" />
                        <circle cx="12" cy="9" r="2" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Lembaga
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $sekolah->count() }}
                    </p>
                </div>
            </div>
        @endif
    </section>

    @if ($roles['roles'] == 'LEMBAGA')
        <div class="w-full overflow-hidden rounded border bg-white shadow">
            <div class="flex flex-col items-start justify-between border-b px-4 py-3 md:flex-row md:items-center">
                <div class="relative max-w-xs">
                    <label for="hs-table-search" class="sr-only">Search</label>
                    <input type="text" name="hs-table-search" id="global-search"
                        class="dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded border-gray-200 px-3 py-2 ps-9 text-sm shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                        placeholder="Search for items">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="size-4 dark:text-neutral-500 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="whitespace-no-wrap search-table w-full">
                    <thead>
                        <tr
                            class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                            <th class="px-4 truncate py-3">No.</th>
                            <th class="px-4 truncate py-3">HARI</th>
                            <th class="px-4 truncate py-3">NAMA GURU PIKET</th>
                            <th class="px-4 truncate py-3">STATUS PIKET</th>
                        </tr>
                    </thead>
                    <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                        @foreach ($jadwal_guru as $row)
                        @php
                            $getAbsen = App\Models\Absensi::getAbsenByGuru($row->guru->id, $row->hari);
                        @endphp
                            <tr class="dark:text-gray-400 text-gray-700">
                                <td class="px-4 py-3 text-sm font-medium">
                                    {{ $loop->iteration }}.
                                </td>
                                <td class="px-4 py-3 text-sm truncate font-medium">
                                    {{ $row->hari }}
                                </td>
                                <td class="px-4 py-3 text-sm truncate font-medium">
                                    {{ $row->guru->nama }}
                                </td>

                                <td class="px-4 py-3 text-sm truncate font-medium">
                                    <span
                                        class="{{ $getAbsen['status'] == 'ACTIVE' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} dark:bg-green-700 dark:text-green-100 rounded-full px-2 py-1 font-mono font-semibold leading-tight">
                                        {{ $getAbsen['message'] }}
                                    </span>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if ($roles['roles'] == 'MASTER')
        <div class="w-full overflow-hidden rounded border bg-white shadow">
            <div class="flex flex-col items-start justify-between border-b px-4 py-3 md:flex-row md:items-center">
                <div class="relative max-w-xs">
                    <label for="hs-table-search" class="sr-only">Search</label>
                    <input type="text" name="hs-table-search" id="global-search"
                        class="dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded border-gray-200 px-3 py-2 ps-9 text-sm shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                        placeholder="Search for items">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="size-4 dark:text-neutral-500 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="whitespace-no-wrap search-table w-full">
                    <thead>
                        <tr
                            class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                            <th class="px-4 truncate py-3">No.</th>
                            <th class="px-4 truncate py-3">INSTANSI</th>
                            <th class="px-4 truncate py-3">SUB INSTANSI</th>
                            <th class="px-4 truncate py-3">NAMA LEMBAGA</th>
                            <th class="px-4 truncate py-3">NSM</th>
                            <th class="px-4 truncate py-3">NPSN</th>
                            <th class="px-4 truncate py-3">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                        @foreach ($sekolah as $row)
                            @if ($row->status == 'ACTIVE')
                                <tr class="dark:text-gray-400 text-gray-700">
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        {{ $loop->iteration }}.
                                    </td>
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        {{ $row->instansi }}
                                    </td>
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        {{ $row->sub_instansi }}
                                    </td>
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        {{ $row->nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        {{ $row->nsm }}
                                    </td>
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        {{ $row->npsn }}
                                    </td>
                                    <td class="px-4 py-3 text-sm truncate font-medium">
                                        <span
                                            class="{{ $row->status == 'ACTIVE' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} dark:bg-green-700 dark:text-green-100 rounded-full px-2 py-1 font-mono font-semibold leading-tight">
                                            {{ $row->status }}
                                        </span>
                                    </td>


                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
