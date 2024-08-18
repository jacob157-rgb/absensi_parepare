@extends('layouts.admin')

@section('content')
    <select id="tab-select"
        class="dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 block w-full rounded border-gray-200 px-4 py-3 pe-9 text-sm focus:border-blue-500 focus:ring-blue-500 sm:hidden"
        aria-label="Tabs">
        <option value="#hs-tab-to-select-1">Data Sekolah</option>
        <option value="#hs-tab-to-select-2">Wilayah</option>
        <option value="#hs-tab-to-select-3">Kalender</option>
        <option value="#hs-tab-to-select-4">Kepala Sekolah</option>
    </select>

    <div class="dark:border-neutral-700 hidden border-b border-gray-200 sm:block">
        <nav class="flex" aria-label="Tabs" role="tablist" data-hs-tab-select="#tab-select">
            <button type="button"
                class="dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 active -mb-px inline-flex items-center gap-x-2 rounded-t border bg-gray-50 px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-1" aria-selected="true" data-hs-tab="#hs-tab-to-select-1"
                aria-controls="hs-tab-to-select-1" role="tab">
                Data Sekolah
            </button>
            <button type="button"
                class="dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 -mb-px inline-flex items-center gap-x-2 rounded-t border bg-gray-50 px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-2" aria-selected="false" data-hs-tab="#hs-tab-to-select-2"
                aria-controls="hs-tab-to-select-2" role="tab">
                Wilayah
            </button>
            <button type="button"
                class="dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 -mb-px inline-flex items-center gap-x-2 rounded-t border bg-gray-50 px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-3" aria-selected="false" data-hs-tab="#hs-tab-to-select-3"
                aria-controls="hs-tab-to-select-3" role="tab">
                Kalender
            </button>
            <button type="button"
                class="dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 -mb-px inline-flex items-center gap-x-2 rounded-t border bg-gray-50 px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-transparent hs-tab-active:bg-white hs-tab-active:text-blue-600"
                id="hs-tab-to-select-item-4" aria-selected="false" data-hs-tab="#hs-tab-to-select-4"
                aria-controls="hs-tab-to-select-4" role="tab">
                Kepala Sekolah
            </button>
        </nav>
    </div>

    <div class="mb-5 rounded rounded-t-none border border-t-0 bg-white p-5">
        <div id="hs-tab-to-select-1" role="tabpanel" aria-labelledby="hs-tab-to-select-item-1">
            <div class="grid grid-cols-1 space-x-0 space-y-2 p-3 sm:p-0 md:grid-cols-2 md:space-x-2 md:space-y-0">
                <div class="space-y-2">
                    <!-- Nama Sekolah -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Nama Sekolah</span>
                        <input type="text" name="nama" value="{{ $lembaga->nama }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Nama Sekolah" disabled />
                    </label>

                    <!-- Instansi -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Instansi</span>
                        <input type="text" name="instansi" value="{{ $lembaga->instansi }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Instansi" disabled />
                    </label>

                    <!-- Sub Instansi -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Sub Instansi</span>
                        <input type="text" name="sub_instansi" value="{{ $lembaga->sub_instansi }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Sub Instansi" disabled />
                    </label>

                    <!-- Level -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Level</span>
                        <input type="text" name="level" value="{{ $lembaga->level }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Level" disabled />
                    </label>
                </div>

                <div class="space-y-2">
                    <!-- NSM -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">NSM</span>
                        <input type="text" name="nsm" value="{{ $lembaga->nsm }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="NSM" disabled />
                    </label>

                    <!-- NPSN -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">NPSN</span>
                        <input type="text" name="npsn" value="{{ $lembaga->npsn }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="NPSN" disabled />
                    </label>

                    <!-- Tempat Cetak -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Tempat Cetak</span>
                        <input type="text" name="tempat_cetak" value="{{ $lembaga->tempat_cetak }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Tempat Cetak" disabled />
                    </label>

                    <!-- Status -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Status</span>
                        <input type="text" name="status" value="{{ $lembaga->status }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Status" disabled />
                    </label>
                </div>
            </div>
        </div>
        <div id="hs-tab-to-select-2" class="hidden" role="tabpanel" aria-labelledby="hs-tab-to-select-item-2">
            <div class="grid grid-cols-1 space-x-0 p-3 sm:p-0 md:grid-cols-2 md:space-x-2">
                <div class="space-y-2">
                    <!-- Alamat -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Alamat</span>
                        <input type="text" name="alamat" value="{{ $lembaga->alamat }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Alamat" disabled />
                    </label>

                    <!-- No. Telp -->
                    <label class="block text-sm md:hidden">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">No. Telp</span>
                        <input type="text" name="No. Telp" value="{{ $lembaga->no_telp }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="No. Telp" disabled />
                    </label>

                    <!-- Provinsi -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Provinsi</span>
                        <input type="text" name="Provinsi" value="{{ $lembaga->provinsi }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Provinsi" disabled />
                    </label>

                    <!-- Kabupaten -->
                    <label class="block text-sm md:hidden">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Kabupaten</span>
                        <input type="text" name="Kabupaten" value="{{ $lembaga->kabupaten }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Kabupaten" disabled />
                    </label>

                    <!-- Kecamatan -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Kecamatan</span>
                        <input type="text" name="Kecamatan" value="{{ $lembaga->kecamatan }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Kecamatan" disabled />
                    </label>

                    <!-- Latitude -->
                    <label class="hidden text-sm md:block">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Latitude</span>
                        <input type="text" name="Latitude" value="{{ $lembaga->latitude }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Latitude" disabled />
                    </label>
                </div>

                <div class="space-y-2">
                    <!-- No. Telp -->
                    <label class="hidden text-sm md:block">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">No. Telp</span>
                        <input type="text" name="No. Telp" value="{{ $lembaga->no_telp }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="No. Telp" disabled />
                    </label>

                    <!-- Kabupaten -->
                    <label class="hidden text-sm md:block">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Kabupaten</span>
                        <input type="text" name="Kabupaten" value="{{ $lembaga->kabupaten }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Kabupaten" disabled />
                    </label>

                    <!-- Desa/Kelurahan -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Desa/Kelurahan</span>
                        <input type="text" name="Desa/Kelurahan" value="{{ $lembaga->kelurahan }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Desa/Kelurahan" disabled />
                    </label>

                    <!-- Latitude -->
                    <label class="block text-sm md:hidden">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Latitude</span>
                        <input type="text" name="Latitude" value="{{ $lembaga->latitude }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Latitude" disabled />
                    </label>

                    <!-- Longitude -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Longitude</span>
                        <input type="text" name="Longitude" value="{{ $lembaga->longitude }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
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

                        <span class="dark:text-gray-400 font-semibold text-gray-700">Jam Kerja</span>
                        <input type="text" name="Jam Kerja" value="{{ $nameJamKerja }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Jam Kerja" disabled />
                        <div class="mt-2">
                            @foreach ($jamKerja as $item)
                                @php
                                    $nameJamKerja = $item->nama;
                                @endphp
                                <span
                                    class="dark:bg-blue-700 dark:text-blue-100 mr-1 rounded-full bg-blue-100 px-2 py-1 font-mono font-semibold leading-tight text-blue-700">
                                    {{ $item->hari_libur }}
                                </span>
                            @endforeach
                        </div>
                    </label> <br>

                    <!-- Kalender AKademik -->
                    <label class="mt-3 hidden text-sm md:block">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Kalender Akademik</span>
                        <div class="hs-accordion-group mt-2 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($kalenderAkademik as $item)
                                <div class="hs-accordion dark:hs-accordion-active:border-neutral-700 dark:bg-neutral-800 dark:border-transparent rounded border border-transparent bg-white hs-accordion-active:border-gray-200"
                                    id="hs-active-bordered-heading-{{ $item->id }}">
                                    <button
                                        class="hs-accordion-toggle dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:outline-none dark:focus:text-neutral-400 inline-flex w-full items-center justify-between gap-x-3 px-5 py-4 text-start font-semibold text-gray-800 hover:text-gray-500 disabled:pointer-events-none disabled:opacity-50 hs-accordion-active:text-blue-600"
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
                                            <p class="dark:text-neutral-200 text-gray-800">
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
                <div class="space-y-2">
                    <!-- Nama Kamad -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Nama Kamad</span>
                        <input type="text" name="nama" value="{{ $lembaga->nama_kamad }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Nama Kamad" disabled />
                    </label>

                    <!-- NIP Kamad -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">NIP Kamad</span>
                        <input type="text" name="nip_kamad" value="{{ $lembaga->nip_kamad }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="NIP Kamad" disabled />
                    </label>

                    <!-- Status Kamad -->
                    <label class="block text-sm">
                        <span class="dark:text-gray-400 font-semibold text-gray-700">Status Kamad</span>
                        <input type="text" name="Status Kamad" value="{{ $lembaga->status_kamad }}"
                            class="dark:text-gray-300 dark:bg-gray-700 focus:shadow-outline-red form-input mt-1 block w-full rounded border-gray-300 text-sm focus:border-red-400 focus:outline-none"
                            placeholder="Status Kamad" disabled />
                    </label>


                    <div class="grid grid-cols-1 space-x-0 md:grid-cols-2 md:space-x-2">
                        <!-- Logo Kiri -->
                        <label class="block text-sm">
                            <span class="dark:text-gray-400 font-semibold text-gray-700">Logo Kiri</span>
                            <img id="logoKiriPreview" src="{{ asset($lembaga->logo_kiri) }}" alt="Logo Kiri"
                                class="dark:text-gray-300 dark:bg-gray-700 {{ $lembaga->logo_kiri ? '' : 'hidden' }} mt-1 block w-full rounded border-gray-300 text-sm" />
                        </label>

                        <!-- Logo Kanan -->
                        <label class="block text-sm">
                            <span class="dark:text-gray-400 font-semibold text-gray-700">Logo Kanan</span>
                            <img id="logoKananPreview" src="{{ asset($lembaga->logo_kanan) }}" alt="Logo Kanan"
                                class="dark:text-gray-300 dark:bg-gray-700 {{ $lembaga->logo_kanan ? '' : 'hidden' }} mt-1 block w-full rounded border-gray-300 text-sm" />

                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
