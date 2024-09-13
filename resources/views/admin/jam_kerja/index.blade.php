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
                            Pilih lembaga/sekolah terlebih dahulu untuk melihat daftar jam kerja sesuai lembaganya.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full overflow-hidden rounded shadow bg-white border">
        <div class="flex flex-col items-start justify-between px-4 py-3 border-b md:flex-row md:items-center">
            <button {{-- href="{{ route('jam_kerja.create') }}" --}}
                class="inline-flex items-center flex-none p-2 mb-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded tambahBtn hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-plus">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>Tambah Data
            </button>


            <div class="relative max-w-xs">
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


        {{--  select lembaga  --}}
        <form id="lembaga-form" action="" method="get" class="mx-4 mb-3">
            <label class="block mt-4 text-sm">
                <span class="font-medium text-gray-700 dark:text-gray-400">
                    Pilih Lembaga
                </span>
                <select id="lembaga-select" name="lembaga"
                    class="block w-64 px-3 py-2 mt-1 text-sm bg-white border-gray-300 rounded shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="" disabled selected>- Pilih Lembaga -</option>
                    @foreach ($lembaga as $row)
                        <option value="{{ $row->id }}" {{ request('lembaga') == $row->id ? 'selected' : '' }}>
                            - {{ $row->nama }} -</option>
                    @endforeach
                </select>
            </label>
        </form>

        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap search-table">
                <thead>
                    <tr
                        class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                        <th class="px-4 py-3">No.</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Hari</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($jam_kerja as $row)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $loop->iteration }}.
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                {{ $row->nama }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                {{ $row->hari_libur }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm font-medium">
                                    <button {{-- href="{{ route('jam_kerja.edit', $row->id) }}" --}} data-id="{{ $row->id }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded editBtn dark:text-gray-400 focus:shadow-outline-gray focus:outline-none">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('jam_kerja.destroy', $row->id) }}" method="post"
                                        id="delete_{{ $row->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded dark:text-gray-400 show_confirm focus:shadow-outline-gray focus:outline-none"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $jam_kerja->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    @include('components.modal')

    <script>
        $(document).ready(function() {
            const days = [{
                    value: 'SENIN',
                    text: 'SENIN'
                },
                {
                    value: 'SELASA',
                    text: 'SELASA'
                },
                {
                    value: 'RABU',
                    text: 'RABU'
                },
                {
                    value: 'KAMIS',
                    text: 'KAMIS'
                },
                {
                    value: 'JUMAT',
                    text: 'JUMAT'
                },
                {
                    value: 'SABTU',
                    text: 'SABTU'
                },
                {
                    value: 'MINGGU',
                    text: 'MINGGU'
                }
            ];

            function populateOptions(options) {
                const selectElement = document.getElementById("selectHari");
                selectElement.innerHTML = "";

                options.forEach(function(option) {
                    const optionElement = document.createElement("option");
                    optionElement.value = option.value;
                    optionElement.textContent = option.text;

                    selectElement.appendChild(optionElement);
                });

                // Inisialisasi ulang plugin untuk select
                window.HSStaticMethods.autoInit(['select']);
            }

            $(document).on('click', '.tambahBtn', function(e) {
                e.preventDefault();

                let modalLabel = 'Tambah {{ $pages }}';
                let postUrl = `{{ route('jam_kerja.store') }}`;
                let modalContent = `
                    <label class="block text-sm">
                        <span class="mb-1 font-semibold text-gray-700 dark:text-gray-400">
                             Lembaga
                        </span>
                        <select name="lembaga" class="{{ $errors->has('lembaga') ? 'border-red-600' : 'border-gray-200' }} py-2 px-4 pe-9 block w-full rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option selected="" value="">Pilih Lembaga</option>
                            @foreach ($lembaga as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                        @error('lembaga')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                    <label class="block mt-2 text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Hari Libur</span>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Masukkan Nama Hari Libur" />
                        @error('nama')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block mt-2 text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Hari</span>
                        <!-- Select -->
                        <select multiple="" id="selectHari" name="hari_libur[]" data-hs-select='{
                        "placeholder": "Pilih Hari...",
                        "dropdownClasses": "mt-2 z-100 w-1/2 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-1 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "mode": "tags",
                        "wrapperClasses": "relative ps-0.5 pe-9 flex items-center flex-wrap text-nowrap w-full border border-gray-200 rounded text-start text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400",
                        "tagsItemTemplate": "<div class=\\"flex flex-nowrap items-center relative z-10 bg-white border border-gray-200 rounded p-1 m-1 dark:bg-neutral-900 dark:border-neutral-700 \\"><div class=\\"size-6 me-1\\" data-icon></div><div class=\\"whitespace-nowrap text-gray-800 dark:text-neutral-200 \\" data-title></div><div class=\\"inline-flex shrink-0 justify-center items-center size-5 ms-2 rounded text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 text-sm dark:bg-neutral-700/50 dark:hover:bg-neutral-700 dark:text-neutral-400 cursor-pointer\\" data-remove><svg class=\\"shrink-0 size-3\\" xmlns=\\"http://www.w3.org/2000/svg\\" width=\\"24\\" height=\\"24\\" viewBox=\\"0 0 24 24\\" fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"M18 6 6 18\\"/><path d=\\"m6 6 12 12\\"/></svg></div></div>",
                        "tagsInputClasses": "py-2 px-2 rounded w-auto order-1 text-sm focus:outline-none outline-none border-0 dark:bg-neutral-900 dark:placeholder-neutral-500 dark:text-neutral-400",
                        "optionTemplate": "<div class=\\"flex items-center\\"><div class=\\"size-8 me-2\\" data-icon></div><div><div class=\\"text-sm font-semibold text-gray-800 dark:text-neutral-200 \\" data-title></div><div class=\\"text-xs text-gray-500 dark:text-neutral-500 \\" data-description></div></div><div class=\\"ms-auto\\"><span class=\\"hidden hs-selected:block\\"><svg class=\\"shrink-0 size-4 text-blue-600\\" xmlns=\\"http://www.w3.org/2000/svg\\" width=\\"16\\" height=\\"16\\" fill=\\"currentColor\\" viewBox=\\"0 0 16 16\\"><path d=\\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\\"/></svg></span></div></div>",
                        "extraMarkup": "<div class=\\"absolute top-1/2 end-3 -translate-y-1/2\\"><svg class=\\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \\" xmlns=\\"http://www.w3.org/2000/svg\\" width=\\"24\\" height=\\"24\\" viewBox=\\"0 0 24 24\\" fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><path d=\\"m7 15 5 5 5-5\\"/><path d=\\"m7 9 5-5 5 5\\"/></svg></div>"
                        }' class="hidden">
                        </select>
                        <!-- End Select -->
                    </label>
                `;

                $('#modal-label').text(modalLabel);
                $('#modal-form').attr('action', postUrl);
                $('#modal-content').html(modalContent);

                // Panggil populateOptions setelah konten modal diisi
                populateOptions(days);

                // Buka modal
                HSOverlay.open('#modal');
            });

            $(document).on('click', '.editBtn', function(e) {
                e.preventDefault();
                let jamKerjaId = $(this).data('id');
                let getUrl = `{{ route('jam_kerja.edit', '') }}/${jamKerjaId}`;

                $.ajax({
                    url: getUrl,
                    method: 'GET',
                    success: function(response) {
                        // Use the response directly since it matches the expected structure
                        let data = response.jam_kerja;

                        let modalLabel = `Edit ${response.pages}`;
                        let postUrl = `{{ route('jam_kerja.update', '') }}/${jamKerjaId}`;
                        let modalContent = `
                <!-- Lembaga -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Lembaga</span>
                        <input type="text" value="${response.lembaga}"
                            class="block w-full mt-1 text-sm bg-gray-300 border-gray-300 rounded dark:text-gray-300 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Masukkan Lembaga" disabled />
                    </label>
                </div>

                <!-- Nama Hari Libur -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Hari Libur</span>
                        <input type="text" name="nama" value="${data.nama}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Masukkan Nama Hari Libur" />
                        @error('nama')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Hari Libur -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Hari Libur</span>
                        <select name="hari_libur" data-placeholder="Hari Libur"
                            class="block w-full mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50">
                            <option value="">Pilih Hari Libur</option>
                            <option value="SENIN" ${data.hari_libur === 'SENIN' ? 'selected' : ''}>SENIN</option>
                            <option value="SELASA" ${data.hari_libur === 'SELASA' ? 'selected' : ''}>SELASA</option>
                            <option value="RABU" ${data.hari_libur === 'RABU' ? 'selected' : ''}>RABU</option>
                            <option value="KAMIS" ${data.hari_libur === 'KAMIS' ? 'selected' : ''}>KAMIS</option>
                            <option value="JUMAT" ${data.hari_libur === 'JUMAT' ? 'selected' : ''}>JUMAT</option>
                            <option value="SABTU" ${data.hari_libur === 'SABTU' ? 'selected' : ''}>SABTU</option>
                            <option value="MINGGU" ${data.hari_libur === 'MINGGU' ? 'selected' : ''}>MINGGU</option>
                        </select>
                        @error('hari_libur')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            `;

                        // Update modal label and content
                        $('#modal-label').text(modalLabel);
                        $('#modal-form').attr('action', postUrl);
                        $('#modal-content').html(modalContent);

                        // Open the modal
                        HSOverlay.open('#modal');
                    },
                    error: function(xhr) {
                        console.error('Error fetching data:', xhr.responseText);
                        // Handle error accordingly
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function() {

            {{--  handle params query  --}}
            $('#lembaga-select').change(function() {
                $('#lembaga-form').submit();
            });

        });
    </script>
@endsection
