@extends('layouts.admin')
@section('content')
    <div class="w-full overflow-hidden rounded shadow-inner">
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
                        <a class="tambahManual dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex items-center gap-x-3.5 rounded-lg px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                            href="#">
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


        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap search-table">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 bg-gray-50">
                        <th class="px-4 py-3">No.</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">NIK/NIP</th>
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
                                {{ $row->nik_nip }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                <span id="password-text-{{ $row->id }}" data-password="{{ $row->password_view }}">
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
                                <div class="flex items-center space-x-4 text-sm font-medium">
                                    <button data-id="{{ $row->id }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 editBtn focus:shadow-outline-gray focus:outline-none"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('siswa.destroy', $row->id) }}" method="post"
                                        id="delete_{{ $row->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded dark:text-gray-400 show_confirm focus:shadow-outline-gray focus:outline-none"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
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
            {{ $siswa->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    @include('components.modal')

    <script>
        $(document).ready(function() {

            $(document).on('click', '.tambahManual', function(e) {
                e.preventDefault();

                let modalLabel = 'Tambah {{ $pages }}';
                let postUrl = `{{ route('siswa.store') }}`;
                let modalContent = `
                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Nama</span>
                            <input type="text" name="nama" value="{{ old('nama') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Nama Siswa" required/>
                            @error('nama')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">NIP/NIK</span>
                            <input type="number" name="nik_nip" value="{{ old('nik_nip') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan NIP/NIK Siswa" required/>
                            @error('nik_nip')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Password</span>
                            <input type="text" name="password" value="{{ old('password') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Password Siswa" required/>
                            @error('password')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                `;

                $('#modal-label').text(modalLabel);
                $('#modal-form').attr('action', postUrl);
                $('#modal-content').html(modalContent);

                // Buka modal
                HSOverlay.open('#modal');
            });

            // {{--  handle edit siswa  --}}
            $(document).on('click', '.editBtn', function(e) {
                e.preventDefault();
                let siswa_id = $(this).data('id');
                $.ajax({
                    url: `/admin/siswa/${siswa_id}`,
                    type: "GET",
                    success: function(response) {
                        console.log(response);
                        let modalLabel = 'Edit {{ $pages }}';
                        let postUrl = `/admin/siswa/${siswa_id}`;
                        let modalContent = `
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Nama</span>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Nama Siswa" required/>
                            @error('nama')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">NIP/NIK</span>
                            <input type="number" id="nik_nip" name="nik_nip" value="{{ old('nik_nip') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan NIP/NIK Siswa" required/>
                            @error('nik_nip')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Password</span>
                            <input type="text" id="password_view" name="password" value="{{ old('password') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Password Siswa" required/>
                            @error('password')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                `;

                        $('#modal-label').text(modalLabel);
                        $('#modal-form').attr('action', postUrl);
                        $('#modal-content').html(modalContent);
                        $('#nama').val(response.data.siswa.nama);
                        $('#nik_nip').val(response.data.siswa.nik_nip);
                        $('#password_view').val(response.data.siswa.password_view);
                        HSOverlay.open('#modal');
                    }
                });
            });

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
@endsection
