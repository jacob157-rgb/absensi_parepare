@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Tambah {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('perizinan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm mt-2">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Pilih Kelas</span>
                        <select id="kelas" name="kelas"
                            data-hs-select='{
                            "hasSearch": true,
                            "searchPlaceholder": "Search...",
                            "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                            "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                            "placeholder": "Pilih Kelas ...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                            class="hidden">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}" {{ old('kelas') == $item->id ? 'selected' : '' }}>
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
                </div>

                <div>
                    <label class="block text-sm mt-2">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Siswa</span>
                        <select id="siswa" name="siswa"
                            data-hs-select='{
                            "hasSearch": true,
                            "searchPlaceholder": "Search...",
                            "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                            "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                            "placeholder": "Pilih siswa ...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }'
                            class="hidden">
                            <option value="" disabled selected>Pilih siswa</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}" {{ old('siswa') == $item->id ? 'selected' : '' }}>
                                    - {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('siswa')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kategori</span>
                        <select name="kategori" data-placeholder="kategori" id="kategori" required
                            class="block w-full mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50">
                            <option value="">Pilih kategori</option>
                            <option value="SAKIT" {{ old('kategori') == 'SAKIT' ? 'selected' : '' }}>SAKIT</option>
                            <option value="LAINNYA" {{ old('kategori') == 'LAINNYA' ? 'selected' : '' }}>LAINNYA</option>
                        </select>
                        @error('kategori')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div id="kategori-lainnya" style="display: none;">
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Berikan Alasannya</span>
                        <input type="text" name="kategori_lain" id="kategori-lain" value="{{ old('kategori_lain') }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Berikan Alasan perizinan" />
                        @error('kategori_lain')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Dari tanggal</span>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Berikan Alasannya" />
                        @error('tanggal_mulai')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Sampai tanggal</span>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                            value="{{ old('tanggal_selesai') }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Berikan Alasannya" />
                        @error('tanggal_selesai')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 flex dark:text-gray-400 flex-grow">
                            Surat Keterangan
                            <small class="text-blue-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-info ml-2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 16v-4" />
                                    <path d="M12 8h.01" />
                                </svg>
                                <span class="ml-1">.pdf, .jpg, .jpeg, .png, .doc, .docx</span>
                            </small>
                        </span>
                        <input type="file" name="surat_keterangan" id="surat_keterangan"
                            value="{{ old('surat_keterangan') }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="files" accept=".pdf, .jpg, .jpeg, .png, .doc, .docx" />

                        @error('surat_keterangan')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

            </div>

            @include('components.button_save')
        </form>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kelas').on('change', function() {

                function populateOptionsKelas(options) {
                    const selectElement = document.getElementById("siswa");
                    selectElement.innerHTML = "";

                    console.log(selectElement);
                    options.forEach(function(option) {

                        const optionElement = document.createElement("option");
                        optionElement.value = option.id;
                        optionElement.textContent = option.nama;

                        selectElement.appendChild(optionElement);
                    });

                    // Inisialisasi ulang plugin untuk select
                    window.HSStaticMethods.autoInit(['select']);
                }


                var idKelas = $(this).val();
                if (idKelas) {
                    $.ajax({
                        url: "{{ route('perizinan.getSiswa', ':id_kelas') }}".replace(':id_kelas',
                            idKelas),
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            populateOptionsKelas(response.siswa);
                        },
                        error: function(xhr, status, error) {
                            console.error("Terjadi kesalahan saat memuat data siswa:", error);
                        }
                    });
                } else {
                    $('#siswa').html('<option value="">- Pilih siswa -</option>').trigger('change');
                }
            });


            {{--  handle kategori  --}}
            $('#kategori').change(function() {
                if ($(this).val() === 'LAINNYA') {
                    $('#kategori-lainnya').show();
                    $('#kategori').removeAttr('name');
                    $('#kategori-lain').attr('name', 'kategori');
                } else {
                    $('#kategori-lainnya').hide();
                    $('#kategori').attr('name', 'kategori');
                    $('#kategori-lain').removeAttr('name');
                }
            });

            $('#kategori').trigger('change');
        });
    </script>
@endpush
