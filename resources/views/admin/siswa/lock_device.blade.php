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
                            Pilih kelas terlebih dahulu untuk melihat informasi data siswa.
                        </li>
                        <li>
                            Reset device akan menghapus identitas device lama.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full lg:overflow-visible overflow-hidden rounded shadow bg-white border">
        <!-- Kelas -->
        <span class="font-semibold text-white dark:text-gray-400">placeholder</span>
        <form id="kelas-form" action="" method="get" class="my-2 mx-4">
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

        @if (!request('kelas'))
        <br>
        @endif

        @if (request('kelas'))
        <div class="relative max-w-xs ml-auto justify-end flex m-2">
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
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap search-table">
                    <thead>
                        <tr
                        class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">NISN</th>
                            <th class="px-4 py-3">Informasi Device</th>
                            <th class="px-4 py-3">Lock Device</th>
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
                                <td class="px-4 py-3 text-sm font-medium">

                                    <div class="hs-accordion-group">
                                        <div class="hs-accordion" id="hs-basic-heading-three">
                                            <button
                                                class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400"
                                                aria-expanded="false" aria-controls="hs-basic-collapse-three">
                                                <svg class="hs-accordion-active:hidden block size-3.5"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                                <svg class="hs-accordion-active:block hidden size-3.5"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                </svg>
                                                Informasi Detail Device
                                            </button>
                                            <div id="hs-basic-collapse-three"
                                                class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                role="region" aria-labelledby="hs-basic-heading-three">
                                                <p class="text-gray-800 dark:text-neutral-200">
                                                    @if ($row->metaSiswa->count() == 0)
                                                        Belum ada informasi
                                                    @else
                                                        @foreach ($row->metaSiswa as $meta)
                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Device</td>
                                                                        <td class="px-4 py-2">:
                                                                            {{ json_decode($meta->meta, true)['device'] ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Browser</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['browser'] ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Browser Version:
                                                                        </td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['browser_version'] ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Platform</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['platform'] ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">IP</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['ip'] ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Waktu</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['waktu'] ?? 'N/A' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Is Mobile</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['is_mobile'] ? 'Yes' : 'No' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Is Tablet</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['is_tablet'] ? 'Yes' : 'No' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Is Desktop</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['is_desktop'] ? 'Yes' : 'No' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Is Robot</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['is_robot'] ? 'Yes' : 'No' }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="px-4 py-2 font-medium">Is Bot</td>
                                                                        <td class="px-4 py-2"> :
                                                                            {{ json_decode($meta->meta, true)['is_bot'] ? 'Yes' : 'No' }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @endforeach
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm font-medium">
                                    @foreach ($row->metaSiswa as $meta)
                                        {{ $meta->lock_device }}
                                    @endforeach
                                </td>
                                <td class="px-4 py-3">
                                    <form action="{{ route('siswa.destroyLockDevice', $row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                            RESET
                                        </button>
                                    </form>
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
