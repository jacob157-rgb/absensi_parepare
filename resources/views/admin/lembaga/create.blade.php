@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Tambah {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ route('lembaga.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Instansi -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Instansi</span>
                        <input type="text" name="instansi" value="{{ old('instansi') }}"
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
                        <input type="text" name="sub_instansi" value="{{ old('sub_instansi') }}"
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
                        <input type="text" name="nama" value="{{ old('nama') }}"
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
                            class="block hs-select w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-select"
                            data-hs-select>
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
                        <span class="text-gray-700 font-semibold dark:text-gray-400">NSM</span>
                        <input type="number" name="nsm" value="{{ old('nsm') }}"
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
                        <input type="number" name="npsn" value="{{ old('npsn') }}"
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
                        <select name="provinsi" class="hs-select" data-placeholder="Provinsi">
                            <option value="">Choose</option>
                        </select>
                        @error('provinsi')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Kabupaten</span>
                        <select name="kabupaten" class="hs-select" data-placeholder="Kabupaten">
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
                        <select name="kecamatan" class="hs-select" data-placeholder="Kecamatan">
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
                        <select name="kelurahan" class="hs-select" data-placeholder="Kelurahan">
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
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
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
                        <input type="number" name="no_telp" value="{{ old('no_telp') }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="No Telp" />
                        @error('no_telp')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Level -->
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Status</span>
                        <select name="status" data-placeholder="Status"
                            class="block hs-select w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-select"
                            data-hs-select>
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
                        <span class="text-gray-700 font-semibold dark:text-gray-400">Latitude</span>
                        <input type="text" name="latitude" value="{{ old('latitude') }}"
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
                        <input type="text" name="longitude" value="{{ old('longitude') }}"
                            class="block w-full mt-1 rounded text-sm border-gray-300 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                            placeholder="longitude" />
                        @error('longitude')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>


            </div>

            <!-- Tombol Submit -->
            <div class="mt-4 flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
