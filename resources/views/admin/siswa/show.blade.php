@extends('layouts.admin')

@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Detail {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form>
            @csrf
            <section
                class="focus:shadow-outline-green my-6 text-center rounded bg-green-600 p-4 text-sm font-semibold text-white shadow-md focus:outline-none">
                DATA SISWA
            </section>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <!-- NISN -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">NISN</span>
                        <input type="text" name="nisn" value="{{ $siswa->nisn }}"
                            class="block w-full mt-1 text-sm uppercase  border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="NISN" disabled />
                        @error('nisn')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <!-- NIS -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">NIS</span>
                        <input type="text" name="nis" value="{{ $siswa->nis }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="NIS" disabled />
                        @error('nis')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Nama -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Siswa</span>
                        <input type="text" name="nama" value="{{ $siswa->nama }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Nama Siswa" disabled />
                        @error('nama')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Tempat Lahir -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Tempat Lahir</span>
                        <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Tempat Lahir" disabled />
                        @error('tempat_lahir')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Tanggal Lahir</span>
                        <input type="text" name="tanggal_lahir" value="{{ formatTanggalLengkap($siswa->tanggal_lahir) }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Tanggal Lahir" disabled />
                        @error('tanggal_lahir')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Jenis Kelamin</span>
                        <input type="text" name="jenis_kelamin" value="{{ $siswa->jenis_kelamin }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Tanggal Lahir" disabled />
                        @error('jenis_kelamin')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Kelas -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kelas</span>
                        <input type="text" name="password"
                            value="Kelas {{ $siswa->kelas->tingkat_kelas }} {{ $siswa->kelas->kelompok }} ( {{ $siswa->kelas->urusan_kelas }} ) ( jurusan {{ $siswa->kelas->jurusan }} )"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Password" disabled />
                        @error('password')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Password</span>
                        <input type="text" name="password" value="{{ $siswa->password_view }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Password" disabled />
                        @error('password')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>

            <section
                class="focus:shadow-outline-green my-6 text-center  rounded bg-green-600 p-4 text-sm font-semibold text-white shadow-md focus:outline-none">
                DATA WALI SISWA
            </section>

            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                <!-- Nama Wali -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Wali</span>
                        <input type="text" name="nama_wali" value="{{ $wali->nama_wali }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Nama Wali" disabled />
                        @error('nama_wali')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Alamat Wali</span>
                        <input type="text" name="alamat_wali" value="{{ $wali->alamat }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Alamat Wali" disabled />
                        @error('alamat_wali')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- No HP Wali -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">No HP Wali</span>
                        <input type="number" name="no_hp_wali" value="{{ $wali->no_hp }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="No HP Wali" disabled />
                        @error('no_hp_wali')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <!-- Password Wali -->
                <div>
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Password Wali</span>
                        <input type="text" name="password_wali" value="{{ $wali->password_view }}"
                            class="block w-full mt-1 text-sm uppercase border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Password Wali" disabled />
                        @error('password_wali')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

            </div> <br>

        </form>

    </div>
@endsection
