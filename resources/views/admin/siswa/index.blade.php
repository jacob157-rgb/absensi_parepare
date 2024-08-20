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
                            Pilih kelas terlebih dahulu untuk melihat dan menambah data siswa.
                        </li>
                        <li>
                            Aksi detail untuk melihat detail siswa dan wali siswa.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full lg:overflow-visible overflow-hidden rounded shadow-inner">
        <!-- Kelas -->
        <form id="kelas-form" action="" method="get" class="my-4 mx-4">
            <label class="block text-sm">
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
                    class="hidden">
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
        </form>

        @if (request('kelas'))
            <div class="flex flex-col items-start justify-between px-4 py-3 border-b md:flex-row md:items-center">
                <div class="relative inline-flex hs-dropdown">
                    <button id="hs-dropdown-with-icons" type="button"
                        class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded shadow-sm hs-dropdown-toggle dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        Tambah Data
                        <svg class="size-4 hs-dropdown-open:rotate-180" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div class="hs-dropdown-menu duration min-w-60 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 mt-2 hidden space-y-0.5 divide-y divide-gray-200 rounded-lg bg-white p-1 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                        <div class="py-2 first:pt-0 last:pb-0">
                            <a class=" dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                href="{{ route('siswa.create') }}?kelas={{ request('kelas') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user-plus size-4 shrink-0">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <line x1="19" x2="19" y1="8" y2="14" />
                                    <line x1="22" x2="16" y1="11" y2="11" />
                                </svg>
                                Manual
                            </a>
                            <a class="tambahExcel dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-sheet size-4 shrink-0">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                    <line x1="3" x2="21" y1="9" y2="9" />
                                    <line x1="3" x2="21" y1="15" y2="15" />
                                    <line x1="9" x2="9" y1="9" y2="21" />
                                    <line x1="15" x2="15" y1="9" y2="21" />
                                </svg>
                                Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="relative max-w-xs hidden lg:block">
                    <label for="hs-table-search" class="sr-only">Search</label>
                    <input type="text" name="hs-table-search" id="global-search"
                        class="block w-full px-3 py-2 text-sm border-gray-200 rounded shadow-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 ps-9 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                        placeholder="Search for items">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                        <svg class="text-gray-400 size-4 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap search-table">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 bg-gray-50">
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">NISN</th>
                            <th class="px-4 py-3">NIK</th>
                            <th class="px-4 py-3">Password View</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($siswa as $row)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm font-medium">
                                    {{ $loop->iteration }}.
                                </td>
                                <td class="px-4 py-3 text-sm font-medium capitalize">
                                    {{ $row->nama }}
                                </td>
                                <td class="px-4 py-3 text-sm font-medium capitalize">
                                    {{ $row->nisn }}
                                </td>
                                <td class="px-4 py-3 text-sm font-medium capitalize">
                                    {{ $row->nik }}
                                </td>
                                <td class="px-4 py-3 text-sm font-medium capitalize">
                                    <span id="password-text-{{ $row->id }}"
                                        data-password="{{ $row->password_view }}">
                                        ********
                                    </span>
                                    <button id="toggle-password-{{ $row->id }}"
                                        class="ml-2 text-blue-500 focus:outline-none">

                                        <svg id="eye-icon-{{ $row->id }}" xmlns="http://www.w3.org/2000/svg"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-eye hover:text-blue-700">
                                            <path d="M1 12S5 5 12 5s11 7 11 7-4 7-11 7S1 12 1 12Z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>

                                        <svg id="eye-off-icon-{{ $row->id }}" xmlns="http://www.w3.org/2000/svg"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-eye-off hover:text-red-700"
                                            style="display: none;">
                                            <path
                                                d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49" />
                                            <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242" />
                                            <path
                                                d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143" />
                                            <path d="m2 2 20 20" />
                                        </svg>
                                    </button>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="hs-dropdown relative inline-flex">
                                        <button id="hs-dropdown-with-icons" type="button"
                                            class="hs-dropdown-toggle dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            Action
                                            <svg class="size-4 hs-dropdown-open:rotate-180"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </button>

                                        <div class="hs-dropdown-menu duration min-w-60 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 z-10 mt-2 hidden space-y-0.5 divide-y divide-gray-200 rounded-lg bg-white p-1 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="hs-dropdown-with-icons">
                                            <!-- Edit Button -->
                                            <a class="dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                                href="{{ route('siswa.edit', $row->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-pencil">
                                                    <path
                                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                    <path d="m15 5 4 4" />
                                                </svg>
                                                Edit
                                            </a>

                                            <!-- Show Button -->
                                            <a class="dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                                href="{{ route('siswa.show', $row->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-eye">
                                                    <path
                                                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                                Detail
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('siswa.destroy', $row->id) }}" method="post"
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
                                                        <line x1="10" x2="10" y1="11"
                                                            y2="17" />
                                                        <line x1="14" x2="14" y1="11"
                                                            y2="17" />
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
                {{ $siswa->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>

    @include('components.modal')

    <script>
        $(document).ready(function() {

            {{--  handle excel  --}}
            $(document).on('click', '.tambahExcel', function(e) {
                e.preventDefault();

                let modalLabel = 'Import {{ $pages }}';
                let postUrl = `{{ route('siswa.importExcel') }}`;
                let modalContent = `
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">File Excel</span>
                            <input type="file" name="importExcel" value="{{ old('importExcel') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan data excel" required/>
                            @error('importExcel')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" name="kelas" value="{{ request('kelas') }}"
                                class="hidden w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan data excel" required/>
                        <a class="flex items-center font-medium text-sm text-green-500 gap-x-3.5 py-2  " href="{{ asset('import/siswa.xls') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-arrow-down-to-line shrink-0 size-4">
                                <path d="M12 17V3" />
                                <path d="m6 11 6 6 6-6" />
                                <path d="M19 21H5" />
                            </svg>
                            Template Excel
                        </a>
                    </div>
                `;

                $('#modal-label').text(modalLabel);
                $('#modal-form').attr('action', postUrl);
                $('#modal-content').html(modalContent);

                // Buka modal
                HSOverlay.open('#modal');
            });

        });
    </script>


    <script>
        $(document).ready(function() {

            {{--  handle preview password  --}}
            $('[id^="toggle-password-"]').on('click', function() {
                var buttonId = $(this).attr('id');
                var id = buttonId.split('-').pop();

                var passwordText = $('#password-text-' + id);
                var eyeIcon = $('#eye-icon-' + id);
                var eyeOffIcon = $('#eye-off-icon-' + id);

                if (passwordText.text() === '********') {
                    passwordText.text(passwordText.data('password'));
                    eyeIcon.hide();
                    eyeOffIcon.show();
                    eyeOffIcon.addClass('text-red-500');
                } else {
                    passwordText.text('********');
                    eyeIcon.show();
                    eyeOffIcon.hide();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#kelas').on('change', function() {
                $('#kelas-form').submit();
            });
        });
    </script>
@endsection
