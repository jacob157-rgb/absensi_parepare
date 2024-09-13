@extends('layouts.guru')
@section('content')
    {{--  warning  --}}
    <div class="container h-screen">
        <div class="mb-5 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800 dark:border-green-900 dark:bg-green-800/10 dark:text-green-500"
            role="alert" tabindex="-1" aria-labelledby="hs-with-list-label">
            <div class="flex">
                <div class="shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-info size-4 mt-0.5 shrink-0">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4" />
                        <path d="M12 8h.01" />
                    </svg>
                </div>
                <div class="ms-4">
                    <h3 id="hs-with-list-label" class="text-sm font-semibold">
                        Peringatan dan Petunjuk
                    </h3>
                    <div class="mt-2 text-sm text-green-700 dark:text-green-400">
                        <ul class="list-disc space-y-1 ps-5">
                            <li>
                                Pilih kelas terlebih dahulu untuk melihat data siswa.
                            </li>
                            <li>
                                <b>H = HADIR</b>
                            </li>
                            <li>
                                <b>TH = TIDAK HADIR</b>
                            </li>
                            <li>
                                <b>I = IZIN</b>
                            </li>
                            <li>
                                Guru bisa mengabsenkan hanya tanggal saat ini saja, tidak bisa swich ke tanggal selanjutnya
                                atau
                                sebelumnya.
                            </li>
                            <li>
                                Absensi akan masuk sebagai absen tanggal sekarang ini.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4 flex flex-col rounded border bg-white shadow">
            <div class="-m-1.5">
                <div class="inline-block min-w-full p-1.5 align-middle">
                    <div class="rounded border dark:border-neutral-700">
                        <h2
                            class="bg-gray-60000 focus:shadow-outline-blue m-3 my-6 flex items-center rounded p-3 font-semibold shadow focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-notebook-pen">
                                <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                                <path d="M2 6h4" />
                                <path d="M2 10h4" />
                                <path d="M2 14h4" />
                                <path d="M2 18h4" />
                                <path
                                    d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            </svg>
                            <span class="ml-2">ABSENSI MANUAL</span>
                        </h2>

                        <form id="kelas-form" action="" method="get" class="mx-4 my-2 lg:flex lg:space-x-6">
                            <label class="mt-2 block text-sm">
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
                                        <option value="{{ $item->id }}"
                                            {{ request('kelas') == $item->id ? 'selected' : '' }}>
                                            - Kelas {{ $item->tingkat_kelas }} {{ $item->kelompok }} (
                                            {{ $item->urusan_kelas }}
                                            ) ( jurusan
                                            {{ $item->jurusan }} )
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                @enderror
                            </label>
                            <label class="mt-2 block text-sm lg:mt-8">
                                <button type="submit"
                                    class="focus:shadow-outline-blue flex items-center justify-between rounded border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium leading-5 text-white shadow-inner transition-colors duration-150 hover:bg-blue-700 focus:outline-none active:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                                    </svg>
                                    <span>FILTER</span>
                                </button>
                            </label>

                        </form>

                        <div class="relative m-2 ml-auto flex max-w-xs justify-end lg:block">
                            <label for="hs-table-search" class="sr-only">Search</label>
                            <input type="text" name="hs-table-search" id="global-search"
                                class="block w-full rounded border-gray-200 px-3 py-2 ps-9 text-sm shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="Search for items">
                            <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-x-auto border-b border-l border-r">
                <table class="whitespace-no-wrap search-table w-full min-w-full">
                    <thead>
                        <tr
                            class="border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">NISN</th>
                            <th scope="col" class="py-3 ps-4">
                                <div class="flex h-5 items-center">
                                    <input id="select-all-h" type="checkbox"
                                        class="rounded border-green-200 text-green-600 focus:ring-green-500 dark:border-neutral-500 dark:bg-neutral-700 dark:checked:border-green-500 dark:checked:bg-green-500 dark:focus:ring-offset-green-800">
                                    <label for="select-all-h" class="ml-2">H</label>
                                </div>
                            </th>
                            <th scope="col" class="py-3 ps-4">
                                <div class="flex h-5 items-center">
                                    <input id="select-all-th" type="checkbox"
                                        class="rounded border-red-200 text-red-600 focus:ring-red-500 dark:border-neutral-500 dark:bg-neutral-700 dark:checked:border-red-500 dark:checked:bg-red-500 dark:focus:ring-offset-red-800">
                                    <label for="select-all-th" class="ml-2">TH</label>
                                </div>
                            </th>
                            <th scope="col" class="py-3 ps-4">
                                <div class="flex h-5 items-center">
                                    <input id="select-all-i" type="checkbox"
                                        class="rounded border-yellow-200 text-yellow-600 focus:ring-yellow-500 dark:border-neutral-500 dark:bg-neutral-700 dark:checked:border-yellow-500 dark:checked:bg-yellow-500 dark:focus:ring-offset-yellow-800">
                                    <label for="select-all-i" class="ml-2">I</label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach ($siswa as $row)
                            @php
                                $absensi = App\Models\Absensi::getAbsenBySiswa($row->id, $tanggalAbsen);
                            @endphp

                            <tr>
                                <td
                                    class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    {{ $loop->iteration }}.
                                </td>
                                <td
                                    class="whitespace-nowrap px-3 py-4 text-sm font-medium uppercase text-gray-800 dark:text-neutral-200">
                                    {{ $row->nama }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-3 py-4 text-sm font-medium uppercase text-gray-800 dark:text-neutral-200">
                                    {{ $row->nisn }}
                                </td>
                                <td class="py-3 ps-4">
                                    <div class="flex h-5 items-center">
                                        <input id="hs-table-checkbox-h-{{ $row->id }}" type="checkbox"
                                            data-id="{{ $row->id }}" value="H"
                                            {{ $absensi['status'] == 1 ? 'checked' : '' }}
                                            class="checkbox-h rounded border-green-200 text-green-600 focus:ring-green-500 dark:border-neutral-500 dark:bg-neutral-700 dark:checked:border-green-500 dark:checked:bg-green-500 dark:focus:ring-offset-green-800">
                                        <label for="hs-table-checkbox-h-{{ $row->id }}"
                                            class="sr-only">Hadir</label>
                                    </div>
                                </td>
                                <td class="py-3 ps-4">
                                    <div class="flex h-5 items-center">
                                        <input id="hs-table-checkbox-th-{{ $row->id }}" type="checkbox"
                                            data-id="{{ $row->id }}" value="TH"
                                            {{ $absensi['status'] == 0 ? 'checked' : '' }}
                                            class="checkbox-th rounded border-red-200 text-red-600 focus:ring-red-500 dark:border-neutral-500 dark:bg-neutral-700 dark:checked:border-red-500 dark:checked:bg-red-500 dark:focus:ring-offset-red-800">
                                        <label for="hs-table-checkbox-th-{{ $row->id }}" class="sr-only">Tidak
                                            Hadir</label>
                                    </div>
                                </td>
                                <td class="py-3 ps-4">
                                    <div class="flex h-5 items-center">
                                        <input id="hs-table-checkbox-i-{{ $row->id }}" type="checkbox"
                                            data-id="{{ $row->id }}" value="I"
                                            {{ $absensi['status'] == 2 ? 'checked' : '' }}
                                            class="checkbox-i rounded border-yellow-200 text-yellow-600 focus:ring-yellow-500 dark:border-neutral-500 dark:bg-neutral-700 dark:checked:border-yellow-500 dark:checked:bg-yellow-500 dark:focus:ring-offset-yellow-800">
                                        <label for="hs-table-checkbox-i-{{ $row->id }}" class="sr-only">Izin</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('global-search');
            const tables = document.querySelectorAll('.search-table');

            searchInput.addEventListener('keyup', function() {
                const searchTerm = searchInput.value.toLowerCase();

                tables.forEach(function(table) {
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(function(row) {
                        const cells = row.querySelectorAll('td');
                        let rowText = '';

                        cells.forEach(function(cell) {
                            rowText += cell.textContent.toLowerCase() + ' ';
                        });

                        row.style.display = rowText.includes(searchTerm) ? '' : 'none';
                    });
                });
            });
        });

        $(document).ready(function() {

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            // Function to gather checked siswa_ids
            function getSelectedSiswaIds(statusClass) {
                let selectedSiswaIds = [];
                $(statusClass).each(function() {
                    if ($(this).is(':checked')) {
                        selectedSiswaIds.push($(this).data('id'));
                    }
                });
                return selectedSiswaIds;
            }

            // Function to select or deselect all checkboxes
            function selectAllCheckboxes(className, isChecked) {
                $(className).each(function() {
                    $(this).prop('checked', isChecked);
                });
            }

            // Select All H
            $('#select-all-h').on('change', function() {
                var isChecked = $(this).is(':checked');
                selectAllCheckboxes('.checkbox-h', isChecked);
                if (isChecked) {
                    selectAllCheckboxes('.checkbox-th, .checkbox-i', false);
                }
                let siswaIds = getSelectedSiswaIds('.checkbox-h');
                updateAttendance(siswaIds, 'H');
            });

            // Select All TH
            $('#select-all-th').on('change', function() {
                var isChecked = $(this).is(':checked');
                selectAllCheckboxes('.checkbox-th', isChecked);
                if (isChecked) {
                    selectAllCheckboxes('.checkbox-h, .checkbox-i', false);
                }
                let siswaIds = getSelectedSiswaIds('.checkbox-th');
                updateAttendance(siswaIds, 'TH');
            });

            // Select All I
            $('#select-all-i').on('change', function() {
                var isChecked = $(this).is(':checked');
                selectAllCheckboxes('.checkbox-i', isChecked);
                if (isChecked) {
                    selectAllCheckboxes('.checkbox-h, .checkbox-th', false);
                }
                let siswaIds = getSelectedSiswaIds('.checkbox-i');
                updateAttendance(siswaIds, 'I');
            });

            // Individual checkbox change
            $('.checkbox-h, .checkbox-th, .checkbox-i').on('change', function() {
                // Get the parent row
                var row = $(this).closest('tr');

                // Uncheck all checkboxes in this row
                row.find('.checkbox-h, .checkbox-th, .checkbox-i').not(this).prop('checked', false);

                // Get the siswa ID and status
                var siswaId = $(this).data('id'); // Single ID
                var status = $(this).hasClass('checkbox-h') ? 'H' : $(this).hasClass('checkbox-th') ? 'TH' :
                    'I';

                // Update attendance for the selected siswa
                updateAttendance([siswaId], status);
            });

            // Function to send AJAX request
            function updateAttendance(siswaIds, status) {
                $.ajax({
                    url: '/guru/absen/manual',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        siswa_ids: siswaIds, // send array
                        status: status,
                        kelas_id: {{ request()->query('kelas') }}
                    },
                    success: function(response) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil disimpan'
                        });
                    },
                    error: function(xhr) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal disimpan'
                        });
                    }
                });
            }
        });
    </script>
@endpush
