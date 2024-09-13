@extends('layouts.admin')
@section('content')
    <div class="w-full  rounded shadow bg-white border">
        <div class="flex flex-col items-start justify-between border-b px-4 py-3 md:flex-row md:items-center">
            <a href="{{ route('perizinan.create') }}"
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

        <!-- Kelas -->
        <span class="font-semibold text-white dark:text-gray-400">placeholder</span>
        <form id="kelas-form" action="" method="get" class="my-2 mx-4 lg:flex  lg:space-x-6">
            <label class="block text-sm mt-2 lg:w-64 w-full ">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Kelas</span>
                <select id="kelas" name="kelas"
                    data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "Search...",
                                    "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900 z-[1050]", 
                                    "placeholder": "Pilih kelas...",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-[1049] w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 lg:w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>"
                                }'
                    class="hidden w-full">
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
        
            <label class="block text-sm mt-2">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Bulan/Tahun</span>
                <input type="month" name="bln" id="bln" value="{{ request('bln') }}"
                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                    placeholder="Berikan Alasannya" />
            </label>
            <label class="block text-sm lg:mt-8 mt-2">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded shadow-inner active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-filter">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                    </svg>
                    <span>FILTER</span>
                </button>
            </label>
        </form>

    </div>
    <div class="w-full overflow-x-auto">
        <table class="whitespace-no-wrap search-table w-full  min-w-full ">
            <thead>
                <tr
                class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-blue-600 text-left text-xs font-semibold uppercase tracking-wide text-white">
                    <th class="px-4 py-3 truncate">No.</th>
                    <th class="px-4 py-3 truncate">Siswa</th>
                    <th class="px-4 py-3 truncate">Kelas</th>
                    <th class="px-4 py-3 truncate">Alasan Izin</th>
                    <th class="px-4 py-3 truncate">Dari Tanggal</th>
                    <th class="px-4 py-3 truncate">Sampai Tanggal</th>
                    <th class="px-4 py-3 truncate">Surat Keterangan</th>
                    <th class="px-4 py-3 truncate">Status</th>
                    <th class="px-4 py-3 truncate">Dibuat</th>
                    <th class="px-4 py-3 truncate">Aksi</th>
                </tr>
            </thead>
            <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                @foreach ($perizinan as $row)
                    <tr class="dark:text-gray-400 text-gray-700">
                        <td class="px-4 py-3 text-sm font-medium">
                            {{ $loop->iteration }}.
                        </td>
                        <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                            {{ $row->siswa->nama }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                            Kelas {{ $row->kelas->tingkat_kelas }} {{ $row->kelas->kelompok }} (
                            {{ $row->kelas->urusan_kelas }}
                            ) ( jurusan
                            {{ $row->kelas->jurusan }} )
                        </td>
                        <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                            {{ $row->kategori }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                            {{ formatTanggalLengkap($row->tanggal_mulai) }}
                        </td>
                        <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                            {{ formatTanggalLengkap($row->tanggal_selesai) }}
                        </td>
                        <td class="px-4 py-3 text-xs font-medium capitalize truncate">
                            <a href="{{ asset('storage/perizinan/' . $row->surat_keterangan) }}"
                                class="max-w-40 truncate flex whitespace-nowrap py-1.5 px-3 rounded-lg text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500"
                                target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye me-1">
                                    <path
                                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg> {{ $row->surat_keterangan }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-xs font-medium capitalize truncate">

                            @if ($row->status == 'MENUNGGU')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                    {{ $row->status }}
                                </span>
                            @elseif($row->status == 'DISETUJUI')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $row->status }}
                                </span>
                            @elseif($row->status == 'DITOLAK')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    {{ $row->status }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm font-medium capitalize truncate">
                            {{ formatTanggalLengkapWaktu($row->created_at) }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm font-medium">
                                <form action="{{ route('perizinan.getApproved', $row->id) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                        SETUJUI
                                    </button>
                                </form>
                                @if ($row->status == 'DITOLAK')
                                    <button type="button" data-id="{{ $row->id }}"
                                        class="py-2 px-3 preview-alasan  truncate-text inline-flex items-center gap-x-2 text-sm font-medium rounded border border-red-800 text-red-800 hover:border-red-500 hover:text-red-500 focus:outline-none focus:border-red-500 focus:text-red-500 disabled:opacity-50 disabled:pointer-events-none dark:border-white dark:text-white dark:hover:text-neutral-300 dark:hover:border-neutral-300">
                                        LIHAT ALASAN
                                    </button>
                                @else
                                    <button type="button" data-id="{{ $row->id }}"
                                        class="py-2 px-3 reject inline-flex items-center gap-x-2 text-sm font-medium rounded border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                        TOLAK
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $perizinan->links('vendor.pagination.tailwind') }}
    </div>

    @include('components.modal')
@endsection

@push('addon-style')
    <style>
        .truncate-text {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

@push('addon-script')
    <script>
        $(document).on('click', '.reject', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            console.log(id)

            let modalLabel = 'Alasan penolakan perizinan';
            let postUrl = `/admin/perizinan/rejected/${id}`;
            let modalContent = `
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Alasan</span>
                    <textarea name="alasan_penolakan"
                        class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-textarea focus:border-red-400 focus:outline-none"
                        placeholder="Masukkan Alasan">{{ old('alasan_penolakan') }}</textarea>
                    @error('alasan_penolakan')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            `;

            $('#modal-label').text(modalLabel);
            $('#modal-form').attr('action', postUrl);
            $('#modal-content').html(modalContent);
            HSOverlay.open('#modal');

        });

        $(document).on('click', '.preview-alasan', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            $.ajax({
                url: `/admin/perizinan/alasan/${id}`,
                type: "GET",
                success: function(response) {
                    console.log(response)
                    let modalLabel = 'Preview komentar perizinan';
                    let postUrl = `/admin/perizinan/rejected/${id}`;
                    let modalContent = `
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Alasan</span>
                            <textarea name="alasan_penolakan"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-textarea focus:border-red-400 focus:outline-none"
                                placeholder="Masukkan Alasan">${response.izin.alasan_penolakan}</textarea>
                            @error('alasan_penolakan')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    `;


                    $('#modal-label').text(modalLabel);
                    $('#modal-form').attr('action', postUrl);
                    $('#modal-content').html(modalContent);
                    HSOverlay.open('#modal');
                }
            });
        });
    </script>
@endpush
