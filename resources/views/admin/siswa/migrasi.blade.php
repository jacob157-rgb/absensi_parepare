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
                            Pilih <strong> kelas</strong> terlebih dahulu untuk melihat dan menambah data siswa yang akan
                            dipindahkan kelasnya.
                        </li>
                        <li>
                            Pilih <strong>Tujuan Kelas</strong> untuk perpindahan siswanya.
                        </li>
                        <li>
                            Checklist siswa yang akan dipindahkan.
                        </li>
                        <li>
                            List siswa yang diceklist akan masuk kedalam box <strong>siswa terpilih</strong>.
                        </li>
                        <li>
                            Jika sudah dipilih maka lakukan migrasi siswa dengan menekan tombol <strong>MIGRASIKAN SISWA
                                SEKARANG</strong>.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full lg:overflow-visible overflow-hidden rounded shadow-inner">
        <!-- Kelas -->
        <span class="font-semibold text-white dark:text-gray-400">placeholder</span>
        <form id="kelas-form" action="" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Kelas</span>
                <select id="kelasOld" name="kelasOld"
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
                        <option value="{{ $item->id }}" {{ request('kelasOld') == $item->id ? 'selected' : '' }}>
                            - Kelas {{ $item->tingkat_kelas }} {{ $item->kelompok }} ( {{ $item->urusan_kelas }}
                            ) ( jurusan
                            {{ $item->jurusan }} )
                        </option>
                    @endforeach
                </select>
                @error('kelasOld')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>

            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Tujuan Kelas</span>
                <select id="kelasNew" name="kelasNew"
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
                        <option value="{{ $item->id }}" {{ request('kelasNew') == $item->id ? 'selected' : '' }}>
                            - Kelas {{ $item->tingkat_kelas }} {{ $item->kelompok }} ( {{ $item->urusan_kelas }}
                            ) ( jurusan
                            {{ $item->jurusan }} )
                        </option>
                    @endforeach
                </select>
                @error('kelasNew')
                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </label>
        </form>

        <form class="my-4 mx-4 block w-full sm:w-5/12" action="{{ route('siswa.postMigrasi') }}" method="POST"
            id="siswa-form">
            @csrf
            <input type="hidden" name="kelasNew" value="{{ request('kelasNew') }}">
            <label class="block rounded-sm text-sm my-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">
                    Siswa Terpilih
                </span>
                <select id="selected-students" name="siswa[]"
                    class="block w-full border-0 shadow rounded-sm mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
                    multiple>
                    <!-- Options will be populated by jQuery -->
                </select>
            </label>

            @if (request('kelasNew'))
                <button type="submit"
                    class="mb-2 flex items-center justify-center w-full sm:w-auto ml-auto rounded border border-transparent bg-green-600 p-2 text-sm font-medium text-white hover:bg-green-700 focus:bg-green-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 md:mb-0">
                    MIGRASIKAN SISWA SEKARANG
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-up-down ml-2">
                        <path d="m21 16-4 4-4-4" />
                        <path d="M17 20V4" />
                        <path d="m3 8 4-4 4 4" />
                        <path d="M7 4v16" />
                    </svg>
                </button>
            @endif
        </form>


        @if (request('kelasOld'))
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap search-table">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 bg-gray-50">
                            <th class="px-4 py-3">
                                <input type="checkbox" id="select-all"
                                    class="form-checkbox w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                            </th>
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">NISN</th>
                            <th class="px-4 py-3">NIK</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($siswa as $row)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    <input type="checkbox"
                                        class="student-checkbox form-checkbox w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        data-id="{{ $row->id }}" />
                                </td>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div> <br> <br> <br>

    @include('components.modal')

    <script>
        $(document).ready(function() {

            $('#kelasOld, #kelasNew ').on('change', function() {
                $('#kelas-form').submit();
            });

            $('#select-all').on('change', function() {
                var isChecked = $(this).is(':checked');
                $('.student-checkbox').prop('checked', isChecked);
                updateSelectedStudents();
            });

            // Handle individual checkbox change
            $(document).on('change', '.student-checkbox', function() {
                var isChecked = $(this).is(':checked');
                if (!isChecked) {
                    $('#select-all').prop('checked', false);
                }
                updateSelectedStudents();
            });

            function updateSelectedStudents() {
                var selectedStudents = [];
                $('.student-checkbox:checked').each(function() {
                    var studentId = $(this).data('id');
                    var studentName = $(this).closest('tr').find('td:eq(2)').text().trim();
                    selectedStudents.push({
                        id: studentId,
                        name: studentName
                    });
                });

                var $select = $('#selected-students');
                $select.empty();
                $.each(selectedStudents, function(index, student) {
                    $select.append(new Option(student.name, student.id));
                });

                $('#siswa-form input[name="selected_students[]"]').remove();

                $.each(selectedStudents, function(index, student) {
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'siswa[]')
                        .attr('value', student.id)
                        .appendTo('#siswa-form');
                });
            }

        });
    </script>
@endsection
