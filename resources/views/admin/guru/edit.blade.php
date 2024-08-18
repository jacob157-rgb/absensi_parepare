@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Edit {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('kalender_akademik.update', $kalender_akademik->id) }}" method="POST">
            @csrf


            <!-- Sekolah -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Lembaga</span>
                    <input type="text" value="{{ $kalender_akademik->lembaga->nama }}"
                        class="block w-full bg-gray-300 mt-1 text-sm border-gray-300 rounded dark:text-gray-300 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                        placeholder="Masukkan Lembaga" disabled />
                </label>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Nama</span>
                    <input type="text" name="nama" value="{{ old('nama', $kalender_akademik->nama) }}"
                        class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                        placeholder="Masukkan Nama Kegiatan" />
                    @error('nama')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Tanggal -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Tanggal</span>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $kalender_akademik->tanggal) }}"
                        class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none" />
                    @error('tanggal')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Keterangan -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Keterangan</span>
                    <textarea name="keterangan"
                        class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-textarea focus:border-red-400 focus:outline-none"
                        placeholder="Masukkan Keterangan">{{ old('keterangan', $kalender_akademik->keterangan) }}</textarea>
                    @error('keterangan')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Button Save -->
            <div class="mb-4">
                @include('components.button_save')
            </div>
        </form>
    </div>
@endsection
