@extends('layouts.admin')
@section('content')
    <div class="flex flex-col mb-5 bg-white  rounded dark:bg-neutral-600">
        <div class="-m-1.5 overflow-x-auto shadow-inner">
            <div class="flex flex-col items-start justify-between px-4 py-3 md:flex-row md:items-center">
                <button type="button"
                    class="tambahBtn mb-2 inline-flex flex-none items-center rounded  border-transparent bg-blue-600 p-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-plus">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>Tambah Jadwal
                </button>

            </div>
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full border divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                @foreach (['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU'] as $day)
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-center uppercase dark:text-neutral-200 {{ in_array($day, $hari_libur) ? 'bg-red-500 text-white' : 'text-gray-500' }}">
                                        {{ $day }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="dark:odd:bg-neutral-900 dark:even:bg-neutral-800 odd:bg-white even:bg-gray-100">
                                @foreach (['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU'] as $day)
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200 whitespace-nowrap">
                                        @foreach ($jadwal_piket_guru->where('hari', $day) as $row)
                                            <div class="flex justify-between items-center mb-2">
                                                <span>{{ $row->guru->nama }}</span>
                                                <div>
                                                    <button class="text-blue-500 hover:text-blue-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="18" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="lucide lucide-square-pen">
                                                            <path
                                                                d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                            <path
                                                                d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                                                        </svg>
                                                    </button>
                                                    <button class="text-red-500 hover:text-red-700 ml-2">
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
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @include('components.modal')

    <script>
        $(document).ready(function() {

            const days = [
                @foreach ($guru as $gr)
                    {
                        value: '{{ $gr->id }}',
                        text: '{{ $gr->nama }}'
                    },
                @endforeach

            ];

            function populateOptions(options) {
                const selectElement = document.getElementById("selectGuru");
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
                let postUrl = `{{ route('jadwal_piket_guru.store') }}`;
                let modalContent = `
                <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400 font-semibold mb-1">Hari</span>
                        <select name="hari" class="{{ $errors->has('hari') ? 'border-red-600' : 'border-gray-200' }} py-3 px-4 pe-9 block w-full rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500">
                            <option selected="" value="">Pilih Hari</option>
                            <option value="SENIN">SENIN</option>
                            <option value="SELASA">SELASA</option>
                            <option value="RABU">RABU</option>
                            <option value="KAMIS">KAMIS</option>
                            <option value="JUMAT">JUMAT</option>
                            <option value="SABTU">SABTU</option>
                            <option value="MINGGU">MINGGU</option>
                        </select>
                        @error('hari')
                            <span class="text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </span>
                        @enderror
                </label>
                <label class="block mt-2 text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Guru</span>
                    <!-- Select -->
                    <select multiple="" id="selectGuru" name="guru[]" data-hs-select='{
                    "placeholder": "Pilih Guru...",
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
        });
    </script>
@endsection
