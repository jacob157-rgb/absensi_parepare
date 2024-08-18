@extends('layouts.admin')
@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Tambah {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('kalender_akademik.store') }}" method="POST">
            @csrf

            <!-- Sekolah -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Lembaga</span>
                    <select name="lembaga"
                        class="block w-full mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">Pilih Lembaga</option>
                        @foreach ($lembaga as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                    @error('lembaga')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm">
                    <span class="font-semibold text-gray-700 dark:text-gray-400">Nama</span>
                    <input type="text" name="nama" value="{{ old('nama') }}"
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
                    <input type="date" name="tanggal" value="{{ old('tanggal') }}"
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
                        placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
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
