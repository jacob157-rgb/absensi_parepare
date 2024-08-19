@extends('layouts.admin')
@section('content')
    <div class="flex flex-col mb-5 bg-white border rounded dark:bg-neutral-600">
        <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div class="overflow-hidden">
                    <form action="{{ route('jam_absen.update') }}" method="post">
                        @csrf
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase dark:text-neutral-200">
                                        Hari</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-200 text-start">
                                        Jam Masuk</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-200 text-start">
                                        Batas Terlambat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jam_absen as $row)
                                    <tr
                                        class="dark:odd:bg-neutral-900 dark:even:bg-neutral-800 odd:bg-white even:bg-gray-100">
                                        <td class="px-6 py-4 text-sm font-medium text-center text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                            {{ $row->hari }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                            <input type="time" value="{{ $row->jam_masuk }}"
                                                name="jam_absen[{{ $row->id }}][jam_masuk]"
                                                class="block w-full px-4 py-3 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                                placeholder="This is placeholder" readonly>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                            <input type="time" value="{{ $row->jam_terlambat }}"
                                                name="jam_absen[{{ $row->id }}][jam_terlambat]"
                                                class="block w-full px-4 py-3 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                                placeholder="This is placeholder" readonly>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="px-4 pb-4">
                                        <div class="flex justify-end mt-4" id="editDiv">
                                            <button type="button" id="editBtn"
                                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded shadow-inner focus:shadow-outline-blue hover:bg-blue-700 focus:outline-none active:bg-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-pencil me-1">
                                                    <path
                                                        d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                                    <path d="m15 5 4 4" />
                                                </svg>
                                                <span>EDIT</span>
                                            </button>
                                        </div>
                                        <div class="flex justify-end space-x-2" id="actionDiv" style="display: none;">
                                            <div class="flex justify-end mt-4">
                                                <button type="button" id="cancelBtn"
                                                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-800 border border-transparent rounded shadow-inner focus:shadow-outline-gray hover:bg-gray-900 focus:outline-none active:bg-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-x">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                    <span>BATAL</span>
                                                </button>
                                            </div>
                                            @include('components.button_save')
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editBtn = document.getElementById('editBtn');
            const editDiv = document.getElementById('editDiv');
            const actionDiv = document.getElementById('actionDiv');
            const cancelBtn = document.getElementById('cancelBtn');
            const timeInputs = document.querySelectorAll('input[type="time"]');

            let originalValues = Array.from(timeInputs).map(input => input.value);

            // Edit button click event
            editBtn.addEventListener('click', function() {
                editDiv.style.display = 'none';
                actionDiv.style.display = 'flex';
                timeInputs.forEach(input => {
                    input.removeAttribute('readonly');
                });
            });

            cancelBtn.addEventListener('click', function() {
                editDiv.style.display = 'flex';
                actionDiv.style.display = 'none';
                timeInputs.forEach((input, index) => {
                    input.value = originalValues[index];
                    input.setAttribute('readonly', true);
                });
            });
        });
    </script>
@endsection
