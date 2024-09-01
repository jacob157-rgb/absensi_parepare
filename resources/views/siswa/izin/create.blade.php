@extends('layouts.siswa')
@section('content')
    <div class="flex flex-col my-4">
        <div class="-m-1.5">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border-t border-l border-r rounded bg-white dark:border-neutral-700">
                    <h2
                        class="flex items-center p-3 m-3 my-6 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-user-minus">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="22" x2="16" y1="11" y2="11" />
                        </svg>
                        <span class="ml-2">RUANG PEMBUATAN IZIN</span>
                    </h2>
                    <div class="px-4 py-3 mb-8  rounded dark:bg-gray-800">
                        <form action="{{ route('siswa.perizinan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label class="block text-sm">
                                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kategori</span>
                                        <select name="kategori" data-placeholder="kategori" id="kategori" required
                                            class="block w-full mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50">
                                            <option value="">Pilih kategori</option>
                                            <option value="SAKIT" {{ old('kategori') == 'SAKIT' ? 'selected' : '' }}>SAKIT
                                            </option>
                                            <option value="LAINNYA" {{ old('kategori') == 'LAINNYA' ? 'selected' : '' }}>
                                                LAINNYA</option>
                                        </select>
                                        @error('kategori')
                                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>

                                <div id="kategori-lainnya" style="display: none;">
                                    <label class="block text-sm">
                                        <span class="font-semibold text-gray-700 dark:text-gray-400">Berikan
                                            Alasannya</span>
                                        <input type="text" name="kategori_lain" id="kategori-lain"
                                            value="{{ old('kategori_lain') }}"
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
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                            value="{{ old('tanggal_mulai') }}"
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-info ml-2">
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
    <script>
        $(document).ready(function() {

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
