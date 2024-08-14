@extends('layouts.admin')
@section('content')
    <div class="shadow-inner w-full overflow-hidden rounded-lg">
        <div class="flex flex-col items-start justify-between border-b px-4 py-3 md:flex-row md:items-center">
            <a href="{{ route('lembaga.create') }}"
                class="tambahBtn mb-2 inline-flex flex-none items-center rounded border border-transparent bg-blue-600 p-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>Tambah Data
            </a>
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
                        class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        <th class="px-4 py-3">No.</th>
                        <th class="px-4 py-3">INSTANSI</th>
                        <th class="px-4 py-3">SUB INSTANSI</th>
                        <th class="px-4 py-3">NAMA LEMBAGA</th>
                        <th class="px-4 py-3">NSM</th>
                        <th class="px-4 py-3">NPSN</th>
                        <th class="px-4 py-3">STATUS</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                    @foreach ($lembaga as $row)
                        <tr class="dark:text-gray-400 text-gray-700">
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $loop->iteration }}.
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $row->instansi }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $row->sub_instansi }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $row->nama }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $row->nsm }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $row->npsn }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium">
                                <span
                                    class="px-2 font-mono py-1 font-semibold leading-tight {{ $row->status == 'ACTIVE' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }}  rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $row->status }}
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="hs-dropdown relative inline-flex">
                                    <button id="hs-dropdown-with-icons" type="button"
                                        class="hs-dropdown-toggle py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        Action
                                        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m6 9 6 6 6-6" />
                                        </svg>
                                    </button>

                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 divide-y divide-gray-200 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                                        <!-- Edit Button -->
                                        <a class="flex font-medium items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                            href="{{ route('lembaga.edit', $row->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                                <path
                                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                <path d="m15 5 4 4" />
                                            </svg>
                                            Edit
                                        </a>

                                        <!-- Show Button -->
                                        <a class="flex font-medium items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700"
                                            href="{{ route('lembaga.show', $row->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                                <path
                                                    d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            Detail
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('lembaga.destroy', $row->id) }}" method="post"
                                            id="delete_{{ $row->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="flex font-medium show_confirm items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 w-full text-left">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-trash-2">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                    <line x1="10" x2="10" y1="11" y2="17" />
                                                    <line x1="14" x2="14" y1="11" y2="17" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $lembaga->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
