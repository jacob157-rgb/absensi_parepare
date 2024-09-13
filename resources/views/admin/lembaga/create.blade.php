@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Tambah {{ $pages }}
    </h4>
    <div class="mb-8 rounded bg-white px-4 py-3 shadow-md dark:bg-gray-800">
        <form action="{{ route('lembaga.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <!-- Instansi -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Instansi</span>
                        <input type="text" name="instansi" value="{{ old('instansi') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="Instansi" />
                        @error('instansi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Sub Instansi -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Sub Instansi</span>
                        <input type="text" name="sub_instansi" value="{{ old('sub_instansi') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="Sub Instansi" />
                        @error('sub_instansi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Nama -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Lembaga</span>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="Nama Sekolah" />
                        @error('nama')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Level -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Level/Tingkat</span>
                        <select name="level" data-placeholder="Level/Tingkat"
                            class="mt-1 block w-full rounded border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option value="">Pilih Level</option>
                            <option value="TK/RA" {{ old('level') == 'TK/RA' ? 'selected' : '' }}>TK/RA</option>
                            <option value="SD/MI" {{ old('level') == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                            <option value="SMP/MTS" {{ old('level') == 'SMP/MTS' ? 'selected' : '' }}>SMP/MTS</option>
                            <option value="SMA/MA" {{ old('level') == 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
                            <option value="PERGURUAN TINGGI" {{ old('level') == 'PERGURUAN TINGGI' ? 'selected' : '' }}>
                                PERGURUAN TINGGI</option>
                        </select>
                        @error('level')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- NSM -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">NSM</span>
                        <input type="number" name="nsm" value="{{ old('nsm') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="NSM" />
                        @error('nsm')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- NPSN -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">NPSN</span>
                        <input type="number" name="npsn" value="{{ old('npsn') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="NPSN" />
                        @error('npsn')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Provinsi</span>
                        <!-- Select -->
                        <select id="provinsi" name="provinsi"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Provinsi...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Pilih Provinsi</option>
                        </select>
                        <!-- End Select -->
                        @error('provinsi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kabupaten</span>
                        <!-- Select -->
                        <select id="kabupaten" name="kabupaten"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Kabupaten...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        <!-- End Select -->
                        @error('kabupaten')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kecamatan</span>
                        <!-- Select -->
                        <select id="kecamatan" name="kecamatan"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Kecamatan...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        <!-- End Select -->
                        @error('kecamatan')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Desa / Kelurahan</span>
                        <!-- Select -->
                        <select id="kelurahan" name="kelurahan"
                            data-hs-select='{
                                "hasSearch": true,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "block w-full text-sm border-gray-200 rounded focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Desa / Kelurahan...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 mt-1 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                            class="hidden">
                            <option value="">Pilih Desa / Kelurahan</option>
                        </select>
                        <!-- End Select -->
                        @error('kelurahan')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>


                <!-- Alamat -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Alamat</span>
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="Alamat" />
                        @error('alamat')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- No Telp -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">No Telp</span>
                        <input type="number" name="no_telp" value="{{ old('no_telp') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="No Telp" />
                        @error('no_telp')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- tempat_cetak -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Tempat Cetak</span>
                        <input type="text" name="tempat_cetak" value="{{ old('tempat_cetak') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="Tempat cetak" />
                        @error('tempat_cetak')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Level -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Status</span>
                        <select name="status" data-placeholder="Status"
                            class="mt-1 block w-full rounded border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option value="">Pilih Status</option>
                            <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                            <option value="NON ACTIVE" {{ old('status') == 'NON ACTIVE' ? 'selected' : '' }}>NON ACTIVE
                            </option>
                        </select>
                        @error('status')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>


                <!-- Latitude -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Latitude</span>
                        <input type="text" name="latitude" value="{{ old('latitude') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="Latitude" />
                        @error('latitude')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- longitude -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Longitude</span>
                        <input type="text" name="longitude" value="{{ old('longitude') }}"
                            class="focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none dark:bg-gray-700 dark:text-gray-300"
                            placeholder="longitude" />
                        @error('longitude')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div id="map-container" style="width: 100%; height: 400px;">
                    <iframe id="map1" class="h-full w-full"
                        src="https://www.google.com/maps?q=-6.2088,106.8456&z=15&output=embed" frameborder="0"
                        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
            </div>

            <!-- Tombol Submit -->
            @include('components.button_save')

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchSelect('provinsi', '/provinsi');
        });
        document.getElementById('provinsi').addEventListener('change', function() {
            fetchSelect('kabupaten', `/kabupaten?provinsi=${this.value}`);
        });
        document.getElementById('kabupaten').addEventListener('change', function() {
            fetchSelect('kecamatan', `/kecamatan?kabupaten=${this.value}`);
        });
        document.getElementById('kecamatan').addEventListener('change', function() {
            fetchSelect('kelurahan', `/kelurahan?kecamatan=${this.value}`);
        });

        function fetchSelect(params, url) {
            fetch(url)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    const select = HSSelect.getInstance(`#${params}`);

                    data.forEach(function(item) {
                        select.addOption({
                            title: item.name,
                            val: item.name,
                            options: {
                                description: item.description || '',
                                icon: item.icon || ''
                            }
                        });
                    });
                })
                .catch(function(error) {
                    console.error(`Error fetching ${params}:`, error);
                });
        }
    </script>
@endsection
@push('addon-style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endpush
@push('addon-script')
    <script>
        document.getElementById('provinsi').addEventListener('blur', function() {
            updateComboBox('kabupaten', 'provinsi');
        });

        function updateComboBox(dataType, queryString) {
            const comboBox = `#data${dataType.charAt(0).toUpperCase() + dataType.slice(1)}`;
            const element = HSComboBox.getInstance(comboBox, false);

            let query = document.getElementById(queryString).value;
            let apiUrl = `{{ url('/${dataType.toLowerCase()}') }}`;

            let configString = `
    {
        "apiUrl": "${apiUrl}",
        "apiQuery": "${queryString}=${query}",
        "outputItemTemplate": "<div class=\\"cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 rounded focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800\\" data-hs-combo-box-output-item><div class=\\"flex justify-between items-center w-full\\"><div><div data-hs-combo-box-output-item-field=\\"name\\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\\"hidden hs-combo-box-selected:block\\"><svg class=\\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500\\" xmlns=\\"http://www.w3.org/2000/svg\\" width=\\"24\\" height=\\"24\\" viewBox=\\"0 0 24 24\\" fill=\\"none\\" stroke=\\"currentColor\\" stroke-width=\\"2\\" stroke-linecap=\\"round\\" stroke-linejoin=\\"round\\"><polyline points=\\"20 6 9 17 4 12\\"></polyline></svg></span></div></div>",
        "outputEmptyTemplate": "<div class=\\"w-full px-4 py-2 text-sm text-gray-800 rounded dark:bg-neutral-900 dark:text-neutral-200\\">Tidak Ditemukan</div>",
        "outputLoaderTemplate": "<div class=\\"flex items-center justify-center px-4 py-2 text-sm text-gray-800 bg-white rounded dark:bg-neutral-900 dark:text-neutral-200\\"><div class=\\"size-6 dark:text-blue-500 inline-block animate-spin rounded-full border-[3px] border-current border-t-transparent text-blue-600\\" role=\\"status\\" aria-label=\\"loading\\"><span class=\\"sr-only\\">Memuat...</span></div></div>"
    }`;

  

            document.querySelectorAll(comboBox).forEach(node => {
                node.setAttribute("data-hs-combo-box", configString);
            });

            // Ensure HSComboBox is correctly initialized
            new HSComboBox(document.querySelector(comboBox));
            window.HSStaticMethods.autoInit();
        }
    </script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        function updateMap() {
            const latitude = parseFloat(document.querySelector('input[name="latitude"]').value);
            const longitude = parseFloat(document.querySelector('input[name="longitude"]').value);

            if (!isNaN(latitude) && !isNaN(longitude)) {
                // Update the Google Maps iframe with the new latitude and longitude
                const googleMapSrc = `https://www.google.com/maps?q=${latitude},${longitude}&z=15&output=embed`;
                document.getElementById('map1').src = googleMapSrc;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Set up event listeners for input fields
            document.querySelector('input[name="latitude"]').addEventListener('input', updateMap);
            document.querySelector('input[name="longitude"]').addEventListener('input', updateMap);
        });
    </script>
@endpush
