@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Edit {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('lembaga.update', $edit->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Instansi -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Instansi</span>
                        <input type="text" name="instansi" value="{{ $edit->instansi }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="Instansi" />
                        @error('instansi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Sub Instansi -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Sub Instansi</span>
                        <input type="text" name="sub_instansi" value="{{ $edit->sub_instansi }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="Sub Instansi" />
                        @error('sub_instansi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Nama -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Nama Lembaga</span>
                        <input type="text" name="nama" value="{{ $edit->nama }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="Nama Sekolah" />
                        @error('nama')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Level -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Level/Tingkat</span>
                        <select name="level" data-placeholder="Level/Tingkat"
                            class="mt-1 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option value="">Pilih Level</option>
                            <option value="TK/RA" {{ $edit->level == 'TK/RA' ? 'selected' : '' }}>TK/RA</option>
                            <option value="SD/MI" {{ $edit->level == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                            <option value="SMP/MTS" {{ $edit->level == 'SMP/MTS' ? 'selected' : '' }}>SMP/MTS</option>
                            <option value="SMA/MA" {{ $edit->level == 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
                            <option value="PERGURUAN TINGGI" {{ $edit->level == 'PERGURUAN TINGGI' ? 'selected' : '' }}>
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
                        <span class="text-gray-700 font-semibold dark:text-gray-400">NSM</span>
                        <input type="number" name="nsm" value="{{ $edit->nsm }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="NSM" />
                        @error('nsm')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- NPSN -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">NPSN</span>
                        <input type="number" name="npsn" value="{{ $edit->npsn }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="NPSN" />
                        @error('npsn')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Provinsi</span>
                        <select id="provinsi" name="provinsi"
                            class="mt-1 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            data-placeholder="Provinsi">
                            <option value="" selected>{{ $edit->provinsi }}</option>
                        </select>
                        @error('provinsi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Kabupaten</span>
                        <select id="kabupaten" name="kabupaten"
                            class="mt-1 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            data-placeholder="Kabupaten">
                            <option value="">Choose</option>
                        </select>
                        @error('kabupaten')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Kecamatan</span>
                        <select id="kecamatan" name="kecamatan"
                            class="mt-1 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            data-placeholder="Kecamatan">
                            <option value="">Choose</option>
                        </select>
                        @error('kecamatan')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Kelurahan</span>
                        <select id="kelurahan" name="kelurahan"
                            class="mt-1 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            data-placeholder="Kelurahan">
                            <option value="">Choose</option>
                        </select>
                        @error('kelurahan')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>


                <!-- Alamat -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Alamat</span>
                        <input type="text" name="alamat" value="{{ $edit->alamat }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="Alamat" />
                        @error('alamat')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- No Telp -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">No Telp</span>
                        <input type="number" name="no_telp" value="{{ $edit->no_telp }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="No Telp" />
                        @error('no_telp')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- tempat_cetak -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Tempat Cetak</span>
                        <input type="text" name="tempat_cetak" value="{{ $edit->tempat_cetak }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="Tempat cetak" />
                        @error('tempat_cetak')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Level -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Status</span>
                        <select name="status" data-placeholder="Status"
                            class="mt-1 block w-full border-gray-200 rounded text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            <option value="">Pilih Status</option>
                            <option value="ACTIVE" {{ $edit->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                            <option value="NON ACTIVE" {{ $edit->status == 'NON ACTIVE' ? 'selected' : '' }}>NON ACTIVE
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
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Latitude</span>
                        <input type="text" name="latitude" value="{{ $edit->latitude }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="Latitude" />
                        @error('latitude')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- longitude -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Longitude</span>
                        <input type="text" name="longitude" value="{{ $edit->longitude }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="longitude" />
                        @error('longitude')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div id="map" style="height: 120px; width: 100%;" class="rounded"></div>
            </div>

            <!-- Tombol Submit -->
            @include('components.button_save')

        </form>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endpush
@push('addon-script')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let map;
        let marker;

        function initMap() {
            map = L.map('map').setView([-6.2088, 106.8456], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; Kuli IT Tecno'
            }).addTo(map);

            marker = L.marker([-6.2088, 106.8456]).addTo(map);
        }

        function updateMap() {
            const latitude = parseFloat(document.querySelector('input[name="latitude"]').value);
            const longitude = parseFloat(document.querySelector('input[name="longitude"]').value);

            if (!isNaN(latitude) && !isNaN(longitude)) {
                const newPosition = [latitude, longitude];
                map.setView(newPosition, 13);
                marker.setLatLng(newPosition);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            initMap();

            updateMap();

            document.querySelector('input[name="latitude"]').addEventListener('input', updateMap);
            document.querySelector('input[name="longitude"]').addEventListener('input', updateMap);
        });
    </script>

@endpush
