@extends('layouts.admin')
@section('content')
    <div class="w-full overflow-hidden rounded-lg shadow-inner">
        <div class="flex flex-col items-start justify-between border-b px-4 py-3 md:flex-row md:items-center">
            <a href="{{ route('kelas.create') }}"
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
                        <th class="px-4 py-3">TINGKAT KELAS</th>
                        <th class="px-4 py-3">JURUSAN</th>
                        <th class="px-4 py-3">URUSAN KELAS</th>
                        <th class="px-4 py-3">KELOMPOK</th>
                        <th class="px-4 py-3">AKSI</th>
                    </tr>
                </thead>
                <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                    @foreach ($kelas as $row)
                        <tr class="dark:text-gray-400 text-gray-700">
                            <td class="px-4 py-3 text-sm font-medium">{{ $loop->iteration }}.</td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $row->tingkat_kelas }}</td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $row->jurusan }}</td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $row->urusan_kelas }}</td>
                            <td class="px-4 py-3 text-sm font-medium">{{ $row->kelompok ? $row->kelompok : '-' }}</td>

                            <td class="px-4 py-3">
                                <div class="hs-dropdown relative inline-flex">
                                    <button id="hs-dropdown-with-icons" type="button"
                                        class="hs-dropdown-toggle dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        Action
                                        <svg class="size-4 hs-dropdown-open:rotate-180" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m6 9 6 6 6-6" />
                                        </svg>
                                    </button>

                                    <div class="hs-dropdown-menu duration min-w-60 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 z-10 mt-2 hidden space-y-0.5 divide-y divide-gray-200 rounded-lg bg-white p-1 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100"
                                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                                        <!-- Edit Button -->
                                        <a class="dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                            href="{{ route('kelas.edit', $row->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                                                <path
                                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                <path d="m15 5 4 4" />
                                            </svg>
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('kelas.destroy', $row->id) }}" method="post"
                                            id="delete_{{ $row->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="show_confirm dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex w-full items-center gap-x-3.5 rounded-lg px-3 py-2 text-left text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none">
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
            {{ $kelas->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
