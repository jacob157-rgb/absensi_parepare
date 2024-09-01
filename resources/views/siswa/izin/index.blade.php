@extends('layouts.siswa')
@section('content')
    <div class="flex flex-col my-4">
        <div class="-m-1.5">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border-t border-l border-r rounded dark:border-neutral-700">
                    <h2
                        class="flex items-center p-3 m-3 my-6 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-user-minus">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="22" x2="16" y1="11" y2="11" />
                        </svg>
                        <span class="ml-2">RUANG PERIZINAN</span>
                    </h2>
                    <a href="{{ route('siswa.perizinan.create') }}"
                        class="tambahBtn mb-4 ml-3 inline-flex flex-none items-center rounded border border-transparent bg-blue-600 p-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-plus">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>Tambah Perizinan
                    </a>
                </div>
            </div>
        </div>
        <div class="w-full overflow-x-auto border-b border-l border-r">
            <table class="whitespace-no-wrap search-table w-full  min-w-full ">
                <thead>
                    <tr
                        class="dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800 border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        <th class="px-4 py-3 truncate">No.</th>
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
                                <div class="flex items-center space-x-4 text-sm font-medium truncate">

                                    @if ($row->status == 'DITOLAK')
                                        <button type="button" data-id="{{ $row->id }}"
                                            class="py-1 px-2 preview-alasan  truncate-text inline-flex items-center gap-x-2 text-sm font-medium rounded border border-red-800 text-red-800 hover:border-red-500 hover:text-red-500 focus:outline-none focus:border-red-500 focus:text-red-500 disabled:opacity-50 disabled:pointer-events-none dark:border-white dark:text-white dark:hover:text-neutral-300 dark:hover:border-neutral-300">
                                            LIHAT ALASAN
                                        </button>
                                    @elseif ($row->status == 'DISETUJUI')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            SUDAH DISETUJUI
                                        </span>
                                    @else
                                        <div class="hs-dropdown relative inline-flex">
                                            <button id="hs-dropdown-with-icons" type="button"
                                                class="hs-dropdown-toggle dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 inline-flex items-center gap-x-2 rounded border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
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
                                                    href="{{ route('siswa.perizinan.edit', $row->id) }}">
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

                                                <!-- Delete Button -->
                                                <form action="{{ route('siswa.perizinan.destroy', $row->id) }}"
                                                    method="post" id="delete_{{ $row->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="show_confirm dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 flex w-full items-center gap-x-3.5 rounded-lg px-3 py-2 text-left text-sm font-medium text-gray-800 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="18" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="lucide lucide-trash-2">
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
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $perizinan->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <div id="modal"
        class="hs-overlay size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden"
        role="dialog" tabindex="-1" aria-labelledby="modal-label">
        <div
            class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 pointer-events-auto flex flex-col rounded border bg-white shadow-sm">
                <div class="dark:border-neutral-700 flex items-center justify-between border-b px-4 py-3">
                    <h3 id="modal-label" class="dark:text-white font-bold text-gray-800">

                    </h3>
                    <button type="button"
                        class="size-8 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600 inline-flex items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                        aria-label="Tutup" data-hs-overlay="#modal">
                        <span class="sr-only">Tutup</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <form id="modal-form" action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div id="modal-content" class="overflow-y-auto p-4">


                    </div>
                    <div class="dark:border-neutral-700 flex items-center justify-end gap-x-2 border-t px-4 py-3">
                        <button type="button"
                            class="dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                            data-hs-overlay="#modal">
                            Tutup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
    <script>
        $(document).on('click', '.preview-alasan', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            console.log(id)
            $.ajax({
                url: `/siswa/perizinan/alasan/${id}`,
                type: "GET",
                success: function(response) {
                    let modalLabel = 'Komentar Penolakan';
                    let modalContent = `
                        <label class="block text-sm">
                            <div class="flex flex-col bg-white border-l-2 mt-2 border-blue-500 shadow-sm  p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                ${response.izin.alasan_penolakan}
                            </div>
                            @error('alasan_penolakan')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                    `;


                    $('#modal-label').text(modalLabel);
                    $('#modal-content').html(modalContent);
                    HSOverlay.open('#modal');
                }
            });
        });
    </script>
@endpush
