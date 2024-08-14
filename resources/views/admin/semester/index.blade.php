@extends('layouts.admin')
@section('content')
    <div class="shadow-inner w-full overflow-hidden rounded-lg">
        <div class="flex flex-col items-start justify-between border-b px-4 py-3 md:flex-row md:items-center">
            <button type="button"
                class="tambahBtn mb-2 inline-flex flex-none items-center rounded border border-transparent bg-blue-600 p-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 md:mb-0">
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
                        <th class="px-4 py-3">Semester</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="dark:divide-gray-700 dark:bg-gray-800 divide-y bg-white">
                    @foreach ($semester as $row)
                        <tr class="dark:text-gray-400 text-gray-700">
                            <td class="px-4 py-3 text-sm font-medium">
                                {{ $loop->iteration }}.
                            </td>
                            <td class="px-4 py-3 text-sm font-medium capitalize">
                                {{ $row->nama }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm font-medium">
                                    <button data-id="{{ $row->id }}"
                                        class="dark:text-gray-400 editBtn focus:shadow-outline-gray flex items-center justify-between rounded-lg px-2 py-2 text-sm font-medium leading-5 text-blue-600 focus:outline-none"
                                        aria-label="Edit">
                                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('semester.destroy', $row->id) }}" method="post"
                                        id="delete_{{ $row->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="dark:text-gray-400 show_confirm focus:shadow-outline-gray flex items-center justify-between rounded-lg px-2 py-2 text-sm font-medium leading-5 text-red-600 focus:outline-none"
                                            aria-label="Delete">
                                            <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
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
            {{ $semester->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    @include('components.modal')


    <script>
        $(document).ready(function() {
            $(document).on('click', '.tambahBtn', function(e) {
                e.preventDefault();
                let modalLabel = 'Tambah {{ $pages }}';
                let postUrl = `{{ route('semester.store') }}`;
                let modalContent = `
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold mb-1">
                            Semester
                        </span>
                        <select name="semester" class="{{ $errors->has('semester') ? 'border-red-600' : 'border-gray-200' }}py-3 px-4 pe-9 block w-full rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option selected="" value="">Pilih Semester</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                        @error('semester')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                `;

                $('#modal-label').text(modalLabel);
                $('#modal-form').attr('action', postUrl);
                $('#modal-content').html(modalContent);
                HSOverlay.open('#modal');
            });


            $(document).on('click', '.editBtn', function(e) {
                e.preventDefault();
                let semester_id = $(this).data('id');
                $.ajax({
                    url: `/admin/semester/${semester_id}`,
                    type: "GET",
                    success: function(response) {
                        console.log(response);
                        let modalLabel = 'Edit {{ $pages }}';
                        let postUrl = `/admin/semester/${semester_id}`;
                        let modalContent = `
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold mb-1">
                            Semester
                        </span>
                        <select id="semester" name="semester" class="{{ $errors->has('semester') ? 'border-red-600' : 'border-gray-200' }}py-3 px-4 pe-9 block w-full rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option selected="" value="">Pilih Semester</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                        @error('semester')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                `;

                        $('#modal-label').text(modalLabel);
                        $('#modal-form').attr('action', postUrl);
                        $('#modal-content').html(modalContent);
                        $('#semester').val(response.edit.nama);
                        HSOverlay.open('#modal');
                    }
                });
            });
        });
    </script>
@endsection
