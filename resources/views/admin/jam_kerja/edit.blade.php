@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Edit {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('jam_kerja.update', $jam_kerja->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <!-- Lembaga -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Lembaga</span>
                        <input type="text" value="{{ $jam_kerja->lembaga->nama }}"
                            class="block w-full bg-gray-300 mt-1 text-sm border-gray-300 rounded dark:text-gray-300 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Masukkan Lembaga" disabled />
                    </label>
                </div>

                <!-- Nama Hari Libur -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Hari Libur</span>
                        <input type="text" name="nama" value="{{ $jam_kerja->nama }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Masukkan Nama Hari Libur" />
                        @error('nama')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Hari Libur -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Hari Libur</span>
                        <select name="hari_libur" data-placeholder="Hari Libur"
                            class="block w-full mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50">
                            <option value="">Pilih Hari Libur</option>
                            <option value="SENIN" {{ $jam_kerja->hari_libur == 'SENIN' ? 'selected' : '' }}>SENIN</option>
                            <option value="SELASA" {{ $jam_kerja->hari_libur == 'SELASA' ? 'selected' : '' }}>SELASA</option>
                            <option value="RABU" {{ $jam_kerja->hari_libur == 'RABU' ? 'selected' : '' }}>RABU</option>
                            <option value="KAMIS" {{ $jam_kerja->hari_libur == 'KAMIS' ? 'selected' : '' }}>KAMIS</option>
                            <option value="JUMAT" {{ $jam_kerja->hari_libur == 'JUMAT' ? 'selected' : '' }}>JUMAT</option>
                            <option value="SABTU" {{ $jam_kerja->hari_libur == 'SABTU' ? 'selected' : '' }}>SABTU</option>
                            <option value="MINGGU" {{ $jam_kerja->hari_libur == 'MINGGU' ? 'selected' : '' }}>MINGGU</option>
                        </select>
                        @error('hari_libur')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Button Save -->
                <div>
                    @include('components.button_save')
                </div>
            </div>
        </form>
    </div>
@endsection
