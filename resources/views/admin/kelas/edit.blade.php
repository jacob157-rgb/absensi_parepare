@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Tambah {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Tingkat Kelas </span>
                        <!-- Select -->
                        <select id="tingkat_kelas" name="tingkat_kelas"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Tingkat Kelas ...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">- Pilih Tingkat Kelas -</option>
                            <option value="I" {{ $kelas->tingkat_kelas == 'I' ? 'selected' : '' }}>- I -</option>
                            <option value="II" {{ $kelas->tingkat_kelas == 'II' ? 'selected' : '' }}>- II -</option>
                            <option value="III" {{ $kelas->tingkat_kelas == 'III' ? 'selected' : '' }}>- III -</option>
                            <option value="IV" {{ $kelas->tingkat_kelas == 'IV' ? 'selected' : '' }}>- IV -</option>
                            <option value="V" {{ $kelas->tingkat_kelas == 'V' ? 'selected' : '' }}>- V -</option>
                            <option value="VI" {{ $kelas->tingkat_kelas == 'VI' ? 'selected' : '' }}>- VI -</option>
                            <option value="VII" {{ $kelas->tingkat_kelas == 'VII' ? 'selected' : '' }}>- VII -</option>
                            <option value="VIII" {{ $kelas->tingkat_kelas == 'VIII' ? 'selected' : '' }}>- VIII -</option>
                            <option value="IX" {{ $kelas->tingkat_kelas == 'IX' ? 'selected' : '' }}>- IX -</option>
                            <option value="X" {{ $kelas->tingkat_kelas == 'X' ? 'selected' : '' }}>- X -</option>
                            <option value="XI" {{ $kelas->tingkat_kelas == 'XI' ? 'selected' : '' }}>- XI -</option>
                            <option value="XII" {{ $kelas->tingkat_kelas == 'XII' ? 'selected' : '' }}>- XII -</option>
                        </select>
                        <!-- End Select -->
                        @error('tingkat_kelas')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Jurusan </span>
                        <!-- Select -->
                        <select id="jurusan" name="jurusan"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Jurusan ...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">- Pilih Jurusan-</option>
                            <option value="IPA" {{ $kelas->jurusan == 'IPA' ? 'selected' : '' }}>- IPA -</option>
                            <option value="IPS" {{ $kelas->jurusan == 'IPS' ? 'selected' : '' }}>- IPS -</option>
                            <option value="UMUM" {{ $kelas->jurusan == 'UMUM' ? 'selected' : '' }}>- UMUM -</option>
                            <option value="TIDAK_ADA" {{ $kelas->jurusan == 'TIDAK_ADA' ? 'selected' : '' }}>- Tidak Ada -
                            </option>
                        </select>
                        <!-- End Select -->
                        @error('jurusan')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Urusan Kelas</span>
                        <!-- Select -->
                        <select id="urusan_kelas" name="urusan_kelas"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Urusan Kelas ...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">- Pilih Urusan Kelas -</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}" {{ $kelas->urusan_kelas == $i ? 'selected' : '' }}>-
                                    {{ $i }} -</option>
                            @endfor
                        </select>
                        @error('urusan_kelas')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block text-sm">

                        <span class="font-semibold text-gray-700 flex dark:text-gray-400 flex-grow">
                            Kelompok Kelas
                            <small class="text-blue-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-info ml-2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16v-4" />
                                    <path d="M12 8h.01" />
                                </svg>
                                <span class="ml-1">Optional</span>
                            </small>
                        </span>

                        <!-- Select -->
                        <select id="kelompok" name="kelompok"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Kelompok Kelas ...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">- Pilih kelompok Kelas -</option>
                            <option value="A" {{ $kelas->kelompok == 'A' ? 'selected' : '' }}>- A -</option>
                            <option value="B" {{ $kelas->kelompok == 'B' ? 'selected' : '' }}>- B -</option>
                            <option value="C" {{ $kelas->kelompok == 'C' ? 'selected' : '' }}>- C -</option>
                            <option value="D" {{ $kelas->kelompok == 'D' ? 'selected' : '' }}>- D -</option>
                            <option value="E" {{ $kelas->kelompok == 'E' ? 'selected' : '' }}>- E -</option>
                            <option value="F" {{ $kelas->kelompok == 'F' ? 'selected' : '' }}>- F -</option>
                            <option value="G" {{ $kelas->kelompok == 'G' ? 'selected' : '' }}>- G -</option>
                            <option value="H" {{ $kelas->kelompok == 'H' ? 'selected' : '' }}>- H -</option>
                            <option value="I" {{ $kelas->kelompok == 'I' ? 'selected' : '' }}>- I -</option>
                            <option value="J" {{ $kelas->kelompok == 'J' ? 'selected' : '' }}>- J -</option>
                        </select>
                        @error('kelompok')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>

                </div>


                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Preview Youtube</span>
                        <div id="youtube-preview"
                            class="min-h-60 flex flex-col mt-1 bg-white border shadow-sm rounded dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                            <!-- Video YouTube Embed will be dynamically inserted here -->
                            <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="lucide lucide-youtube size-10 text-gray-500 dark:text-neutral-500">
                                    <path
                                        d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                                    <path d="m10 15 5-3-5-3z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-800 dark:text-neutral-300">
                                    Belum Ada Konten Disini
                                </p>
                            </div>
                        </div>
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 flex dark:text-gray-400 flex-grow">
                            Live
                            <small class="text-blue-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-info ml-2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16v-4" />
                                    <path d="M12 8h.01" />
                                </svg>
                                <span class="ml-1">Optional</span>
                            </small>
                        </span>

                        <input type="text" id="live-input" name="live" value="{{ $kelas->live }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Live" />
                        @error('live')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

            </div>

            <!-- Tombol Submit -->
            @include('components.button_save')

        </form>
    </div>
@endsection


@push('addon-script')
    <script>
        $(document).ready(function() {
            function updatePreview() {
                var url = $('#live-input').val().trim();
                var youtubePreview = $('#youtube-preview');

                var youtubeRegex =
                    /(?:https?:\/\/)?(?:www\.)?youtube\.com\/(?:watch\?v=|embed\/|v\/|.+\?v=)?([^"&?\/\s]{11})|(?:https?:\/\/)?(?:www\.)?youtu\.be\/([^"&?\/\s]{11})/;
                var match = url.match(youtubeRegex);

                if (match) {
                    var videoId = match[1] || match[2];
                    youtubePreview.html(`
                        <div class="relative w-full pb-[56.25%] bg-gray-200 dark:bg-neutral-800">
                            <iframe class="absolute top-0 left-0 w-full h-full rounded"
                                src="https://www.youtube.com/embed/${videoId}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                        </div>
                    `);
                } else {
                    youtubePreview.html(`
                        <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-youtube size-10 text-gray-500 dark:text-neutral-500">
                                <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                                <path d="m10 15 5-3-5-3z" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-800 dark:text-neutral-300">
                                Belum Ada Konten Disini
                            </p>
                        </div>
                    `);
                }
            }

            $('#live-input').on('input', updatePreview);

            updatePreview();
        });
    </script>
@endpush
