@extends('layouts.admin')

@section('content')
    <select id="tab-select"
        class="block w-full px-4 py-3 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 pe-9 focus:border-blue-500 focus:ring-blue-500 sm:hidden"
        aria-label="Tabs">
        <option value="#hs-tab-to-select-1">Data Sekolah</option>
        <option value="#hs-tab-to-select-2">Wilayah</option>
        <option value="#hs-tab-to-select-3">Kalender</option>
        <option value="#hs-tab-to-select-4">Kepala Sekolah</option>
    </select>

    <div class="hidden border-b border-gray-200 dark:border-neutral-700 sm:block">
        <nav class="flex" aria-label="Tabs" role="tablist" data-hs-tab-select="#tab-select">
            <button type="button"
                class="inline-flex items-center px-4 py-3 -mb-px text-sm font-medium text-center text-gray-500 border rounded-t dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 active gap-x-2 bg-gray-50 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-1" aria-selected="true" data-hs-tab="#hs-tab-to-select-1"
                aria-controls="hs-tab-to-select-1" role="tab">
                Data Sekolah
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-3 -mb-px text-sm font-medium text-center text-gray-500 border rounded-t dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 gap-x-2 bg-gray-50 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-2" aria-selected="false" data-hs-tab="#hs-tab-to-select-2"
                aria-controls="hs-tab-to-select-2" role="tab">
                Wilayah
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-3 -mb-px text-sm font-medium text-center text-gray-500 border rounded-t dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 gap-x-2 bg-gray-50 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-3" aria-selected="false" data-hs-tab="#hs-tab-to-select-3"
                aria-controls="hs-tab-to-select-3" role="tab">
                Kalender
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-3 -mb-px text-sm font-medium text-center text-gray-500 border rounded-t dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 gap-x-2 bg-gray-50 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-4" aria-selected="false" data-hs-tab="#hs-tab-to-select-4"
                aria-controls="hs-tab-to-select-4" role="tab">
                Kepala Sekolah
            </button>
        </nav>
    </div>

    <div class="p-5 mb-5 bg-white border border-t-0 rounded rounded-t-none">
        <div id="hs-tab-to-select-1" role="tabpanel" aria-labelledby="hs-tab-to-select-item-1">
            <div class="grid grid-cols-1 p-3 space-x-0 space-y-2 sm:p-0 md:grid-cols-2 md:space-x-2 md:space-y-0">
                <div class="space-y-2">
                    <!-- Nama Sekolah -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Sekolah</span>
                        <input type="text" name="nama" value="{{ $lembaga->nama }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Nama Sekolah" disabled />
                    </label>

                    <!-- Instansi -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Instansi</span>
                        <input type="text" name="instansi" value="{{ $lembaga->instansi }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Instansi" disabled />
                    </label>

                    <!-- Sub Instansi -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Sub Instansi</span>
                        <input type="text" name="sub_instansi" value="{{ $lembaga->sub_instansi }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Sub Instansi" disabled />
                    </label>

                    <!-- Level -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Level</span>
                        <input type="text" name="level" value="{{ $lembaga->level }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Level" disabled />
                    </label>
                </div>

                <div class="space-y-2">
                    <!-- NSM -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">NSM</span>
                        <input type="text" name="nsm" value="{{ $lembaga->nsm }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="NSM" disabled />
                    </label>

                    <!-- NPSN -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">NPSN</span>
                        <input type="text" name="npsn" value="{{ $lembaga->npsn }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="NPSN" disabled />
                    </label>

                    <!-- Tempat Cetak -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Tempat Cetak</span>
                        <input type="text" name="tempat_cetak" value="{{ $lembaga->tempat_cetak }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Tempat Cetak" disabled />
                    </label>

                    <!-- Status -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Status</span>
                        <input type="text" name="status" value="{{ $lembaga->status }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Status" disabled />
                    </label>
                </div>
            </div>
        </div>
        <div id="hs-tab-to-select-2" class="hidden" role="tabpanel" aria-labelledby="hs-tab-to-select-item-2">
            <div class="grid grid-cols-1 p-3 space-x-0 sm:p-0 md:grid-cols-2 md:space-x-2">
                <div class="space-y-2">
                    <!-- Alamat -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Alamat</span>
                        <input type="text" name="alamat" value="{{ $lembaga->alamat }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Alamat" disabled />
                    </label>

                    <!-- No. Telp -->
                    <label class="block text-sm md:hidden">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">No. Telp</span>
                        <input type="text" name="No. Telp" value="{{ $lembaga->no_telp }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="No. Telp" disabled />
                    </label>

                    <!-- Provinsi -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Provinsi</span>
                        <input type="text" name="Provinsi" value="{{ $lembaga->provinsi }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Provinsi" disabled />
                    </label>

                    <!-- Kabupaten -->
                    <label class="block text-sm md:hidden">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kabupaten</span>
                        <input type="text" name="Kabupaten" value="{{ $lembaga->kabupaten }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Kabupaten" disabled />
                    </label>

                    <!-- Kecamatan -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kecamatan</span>
                        <input type="text" name="Kecamatan" value="{{ $lembaga->kecamatan }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Kecamatan" disabled />
                    </label>

                    <!-- Latitude -->
                    <label class="hidden text-sm md:block">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Latitude</span>
                        <input type="text" name="Latitude" value="{{ $lembaga->latitude }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Latitude" disabled />
                    </label>
                </div>

                <div class="space-y-2">
                    <!-- No. Telp -->
                    <label class="hidden text-sm md:block">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">No. Telp</span>
                        <input type="text" name="No. Telp" value="{{ $lembaga->no_telp }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="No. Telp" disabled />
                    </label>

                    <!-- Kabupaten -->
                    <label class="hidden text-sm md:block">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kabupaten</span>
                        <input type="text" name="Kabupaten" value="{{ $lembaga->kabupaten }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Kabupaten" disabled />
                    </label>

                    <!-- Desa/Kelurahan -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Desa/Kelurahan</span>
                        <input type="text" name="Desa/Kelurahan" value="{{ $lembaga->kelurahan }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Desa/Kelurahan" disabled />
                    </label>

                    <!-- Latitude -->
                    <label class="block text-sm md:hidden">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Latitude</span>
                        <input type="text" name="Latitude" value="{{ $lembaga->latitude }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Latitude" disabled />
                    </label>

                    <!-- Longitude -->
                    <label class="block text-sm">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Longitude</span>
                        <input type="text" name="Longitude" value="{{ $lembaga->longitude }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Longitude" disabled />
                    </label>
                </div>
            </div>
        </div>
        <div id="hs-tab-to-select-3" class="hidden" role="tabpanel" aria-labelledby="hs-tab-to-select-item-3">
            <div class="p-3 sm:p-0">
                <div class="space-y-2">
                    @php
                        $jamKerja = App\Models\JamKerja::getByLembaga($lembaga->id);
                        $kalenderAkademik = App\Models\KalenderAkademik::getByLembaga($lembaga->id);
                    @endphp

                    <!-- Jam Kerja -->
                    <label class="hidden text-sm md:block">
                        @php
                            $nameJamKerja = $jamKerja->pluck('nama')->implode(', ');
                        @endphp

                        <span class="font-semibold text-gray-700 dark:text-gray-400">Jam Kerja</span>
                        <input type="text" name="Jam Kerja" value="{{ $nameJamKerja }}"
                            class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                            placeholder="Jam Kerja" disabled />
                        <div class="mt-2">
                            @foreach ($jamKerja as $item)
                                @php
                                    $nameJamKerja = $item->nama;
                                @endphp
                                <span
                                    class="px-2 py-1 mr-1 font-mono font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                    {{ $item->hari_libur }}
                                </span>
                            @endforeach
                        </div>
                    </label> <br>

                    <!-- Kalender AKademik -->
                    <label class="hidden mt-3 text-sm md:block">
                        <span class="font-semibold text-gray-700 dark:text-gray-400">Kalender Akademik</span>
                        <div class="grid grid-cols-1 gap-4 mt-2 hs-accordion-group sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($kalenderAkademik as $item)
                                <div class="bg-white border border-transparent rounded hs-accordion dark:hs-accordion-active:border-neutral-700 dark:bg-neutral-800 dark:border-transparent hs-accordion-active:border-gray-200"
                                    id="hs-active-bordered-heading-{{ $item->id }}">
                                    <button
                                        class="inline-flex items-center justify-between w-full px-5 py-4 font-semibold text-gray-800 hs-accordion-toggle dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400 gap-x-3 text-start hover:text-gray-500 disabled:pointer-events-none disabled:opacity-50 hs-accordion-active:text-blue-600"
                                        aria-expanded="false"
                                        aria-controls="hs-basic-active-bordered-collapse-{{ $item->id }}">
                                        {{ formatTanggalLengkap($item->tanggal) }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-calendar-arrow-down size-3.5 block text-blue-500 hs-accordion-active:hidden">
                                            <path d="m14 18 4 4 4-4" />
                                            <path d="M16 2v4" />
                                            <path d="M18 14v8" />
                                            <path d="M21 11.354V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7.343" />
                                            <path d="M3 10h18" />
                                            <path d="M8 2v4" />
                                        </svg>

                                        <svg class="size-3.5 hidden hs-accordion-active:block"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 15l-6-6-6 6"></path>
                                        </svg>

                                    </button>
                                    <div id="hs-basic-active-bordered-collapse-{{ $item->id }}"
                                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                        role="region" aria-labelledby="hs-active-bordered-heading-{{ $item->id }}">
                                        <div class="px-5 pb-4">
                                            <p class="text-gray-800 dark:text-neutral-200">
                                                {{ $item->keterangan }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </label>
                </div>
            </div>
        </div>
        <div id="hs-tab-to-select-4" class="hidden" role="tabpanel" aria-labelledby="hs-tab-to-select-item-4">
            <div class="p-3 sm:p-0">
                <form action="{{ route('kamad.update', $lembaga->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="space-y-2">
                        @csrf
                        <!-- Nama Kamad -->
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Nama Kamad</span>
                            <input type="text" name="nama_kamad" value="{{ $lembaga->nama_kamad }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="Nama Kamad" />
                            @error('nama_kamad')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Status Kamad -->
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Status Kamad</span>
                            <select name="status_kamad" id="status_kamad"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none">
                                <option value="" disabled {{ $lembaga->status_kamad == '' ? 'selected' : '' }}>Pilih
                                    Status</option>
                                <option value="PNS" {{ $lembaga->status_kamad == 'PNS' ? 'selected' : '' }}>PNS
                                </option>
                                <option value="NON PNS" {{ $lembaga->status_kamad == 'NON PNS' ? 'selected' : '' }}>NON
                                    PNS</option>
                            </select>
                            @error('status_kamad')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- NIP Kamad -->
                        <label id="nip_kamad_label"
                            class="{{ $lembaga->status_kamad == 'PNS' ? 'block' : 'hidden' }} text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">NIP Kamad</span>
                            <input type="number" inputmode="numeric" name="nip_kamad"
                                value="{{ $lembaga->nip_kamad }}"
                                class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                placeholder="NIP Kamad" />
                            @error('nip_kamad')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Password Old -->
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Password Lama</span>
                            <div class="relative">
                                <input id="hs-toggle-password-old" type="password" name="password_old"
                                    class="block w-full py-2 mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                    placeholder="Masukan Password Lama" value="">
                                @error('password_old')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                @enderror
                                <button type="button"
                                    data-hs-toggle-password='{
                                "target": "#hs-toggle-password-old"
                              }'
                                    class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer dark:text-neutral-600 dark:focus:text-blue-500 end-0 rounded-e-md focus:text-blue-600 focus:outline-none">
                                    <svg class="size-3.5 shrink-0" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </label>

                        <!-- Password New -->
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Password Baru</span>
                            <div class="relative">
                                <input id="hs-toggle-password-new" type="password" name="password"
                                    class="block w-full py-2 mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                    placeholder="Masukan Password Baru" value="">
                                @error('password')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                @enderror
                                <button type="button"
                                    data-hs-toggle-password='{
                                "target": "#hs-toggle-password-new"
                              }'
                                    class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer dark:text-neutral-600 dark:focus:text-blue-500 end-0 rounded-e-md focus:text-blue-600 focus:outline-none">
                                    <svg class="size-3.5 shrink-0" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </label>

                        <!-- Password New -->
                        <label class="block text-sm">
                            <span class="font-semibold text-gray-700 dark:text-gray-400">Ulangi Password Baru</span>
                            <div class="relative">
                                <input id="hs-toggle-password-confirm" type="password" name="password_confirmation"
                                    class="block w-full py-2 mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                    placeholder="Ulangi Password Baru" value="">
                                @error('password_confirmation')
                                    <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                                @enderror
                                <button type="button"
                                    data-hs-toggle-password='{
                                "target": "#hs-toggle-password-confirm"
                              }'
                                    class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer dark:text-neutral-600 dark:focus:text-blue-500 end-0 rounded-e-md focus:text-blue-600 focus:outline-none">
                                    <svg class="size-3.5 shrink-0" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </label>


                        <div class="grid grid-cols-1 space-x-0 md:grid-cols-2 md:space-x-2">
                            <!-- Logo Kiri -->
                            <label class="block text-sm">
                                <span class="font-semibold text-gray-700 dark:text-gray-400">Logo Kiri</span>
                                <img id="logoKiriPreview" src="{{ asset($lembaga->logo_kiri) }}" alt="Logo Kiri"
                                    class="dark:text-gray-300 dark:bg-gray-700 {{ $lembaga->logo_kiri ? '' : 'hidden' }} mt-1 block w-52 h-auto rounded border-gray-300 text-sm" />
                                <input type="file" name="logo_kiri" id="logoKiriInput"
                                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                    accept="image/*" />

                                <!-- Hidden input to track the removal of the existing image -->
                                <input type="hidden" name="remove_logo_kiri" id="removeLogoKiriInput" value="0" />
                            </label>

                            <!-- Logo Kanan -->
                            <label class="block text-sm">
                                <span class="font-semibold text-gray-700 dark:text-gray-400">Logo Kanan</span>
                                <img id="logoKananPreview" src="{{ asset($lembaga->logo_kanan) }}" alt="Logo Kanan"
                                    class="dark:text-gray-300 dark:bg-gray-700 {{ $lembaga->logo_kanan ? '' : 'hidden' }} mt-1 block w-52 h-auto rounded border-gray-300 text-sm" />
                                <input type="file" name="logo_kanan" id="logoKananInput"
                                    class="block w-full mt-1 text-sm border-gray-300 rounded dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input focus:border-red-400 focus:outline-none"
                                    accept="image/*" />

                                <!-- Hidden input to track the removal of the existing image -->
                                <input type="hidden" name="remove_logo_kanan" id="removeLogoKananInput"
                                    value="0" />
                            </label>
                        </div>

                        @include('components.button_save')
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#status_kamad').change(function() {
                if ($(this).val() == 'PNS') {
                    $('#nip_kamad_label').show();
                } else {
                    $('#nip_kamad_label').hide();
                }
            }).trigger('change');

            $('input[name="nip_kamad"]').on('input', function() {
                var value = $(this).val();
                if (value < 1) {
                    $(this).val('');
                    alert('Hanya menerima input angka.');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoKiriInput = document.getElementById('logoKiriInput');
            const logoKiriPreview = document.getElementById('logoKiriPreview');
            const removeLogoKiriInput = document.getElementById('removeLogoKiriInput');
            const logoKananInput = document.getElementById('logoKananInput');
            const logoKananPreview = document.getElementById('logoKananPreview');
            const removeLogoKananInput = document.getElementById('removeLogoKananInput');

            logoKiriInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    if (file.size > 2 * 1024 * 1024) { // 2MB size limit
                        alert('File size must be less than 2MB');
                        logoKiriInput.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        logoKiriPreview.src = e.target.result;
                        logoKiriPreview.classList.remove('hidden');
                        removeLogoKiriInput.value =
                            '1'; // Indicate the existing image should be removed
                    };
                    reader.readAsDataURL(file);
                }
            });
            logoKananInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    if (file.size > 2 * 1024 * 1024) { // 2MB size limit
                        alert('File size must be less than 2MB');
                        logoKananInput.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        logoKananPreview.src = e.target.result;
                        logoKananPreview.classList.remove('hidden');
                        removeLogoKananInput.value =
                            '1'; // Indicate the existing image should be removed
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
