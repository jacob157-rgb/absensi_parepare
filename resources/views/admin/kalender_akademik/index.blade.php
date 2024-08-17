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
                            Pilih lembaga/sekolah terlebih dahulu untuk melihat daftar kalender akademik sesuai lembaganya.
                        </li>
                        <li>
                            Kalender akademik adalah hari libur lembaga, maka bisa membuat lebih dari 1 (satu) tanggal.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full overflow-hidden rounded shadow-inner">
        <div class="flex flex-col items-start justify-between px-4 py-3 border-b md:flex-row md:items-center">
            <button {{-- href="{{ route('kalender_akademik.create') }}" --}}
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
                    class="block w-64 px-3 py-2 mt-1 text-sm bg-white border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="" disabled selected> - Pilih Lembaga -</option>
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
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 bg-gray-50">
                        <th class="px-4 py-3">No.</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Keterangan</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($kalender_akademik as $row)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $loop->iteration }}.
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                {{ $row->nama }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                {{ formatTanggalLengkap($row->tanggal) }}
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                {{ $row->keterangan }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm font-medium">
                                    <a href="{{ route('kalender_akademik.edit', $row->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded dark:text-gray-400 editBtn focus:shadow-outline-gray focus:outline-none">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('kalender_akademik.destroy', $row->id) }}" method="post"
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
            {{ $kalender_akademik->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    @include('components.modal')

    <script>
        $(document).ready(function() {

            $(document).on('click', '.tambahBtn', function(e) {
                e.preventDefault();

                let modalLabel = 'Tambah {{ $pages }}';
                let postUrl = `{{ route('kalender_akademik.store') }}`;
                let modalContent = `
                    <!-- Sekolah -->
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Lembaga</span>
                            <select name="lembaga"
                                class="block w-full mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Lembaga</option>
                                @foreach ($lembaga as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            @error('lembaga')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Nama</span>
                            <input type="text" name="nama" value="{{ old('nama') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Nama Kegiatan" />
                            @error('nama')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Tanggal</span>
                            <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none" />
                            @error('tanggal')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Keterangan</span>
                            <textarea name="keterangan"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-textarea focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
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
