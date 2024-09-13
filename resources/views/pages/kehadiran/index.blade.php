@extends('layouts.qrcode')

@section('content')
    <nav class="border bg-white shadow-lg">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Bagian logo di kiri -->
                <div class="flex items-center">
                    <div class="flex flex-shrink-0">
                        <img class="h-10 w-auto" src="{{ asset('assets/img/kemenag.png') }}" alt="Your Company">
                        <img class="ml-2 h-10 w-auto" src="{{ asset('assets/img/man2pare.png') }}" alt="Your Company">
                    </div>
                </div>

                <!-- Tombol Kembali -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button"
                        class="inline-flex items-center gap-x-2 rounded-lg bg-red-600 px-4 py-3 text-sm font-medium text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-house">
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        </svg> kembali
                    </button>
                </div>
            </div>
        </div>
    </nav>



    <div class="z-50 bg-gray-50">
        <div class="container mx-auto p-4">
            <div class="mb-10 rounded-lg border bg-white p-5 shadow">
                <section
                    class="focus:shadow-outline-blue flex items-center justify-between rounded bg-blue-600 p-3 text-sm font-medium uppercase text-white shadow-md focus:outline-none">
                    <div>
                        <div class="text-sm font-medium"><span id="current-day">-</span>, <span id="current-date">-</span>
                        </div>
                    </div>
                    <div>
                        <div class="text-sm font-medium"><span id="current-time">--:--:--</span></div>
                    </div>
                </section>

                <h2
                    class="bg-gray-60 focus:shadow-outline-blue mb-5 mt-5 flex items-center rounded font-semibold focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-notepad-text">
                        <path d="M8 2v4" />
                        <path d="M12 2v4" />
                        <path d="M16 2v4" />
                        <rect width="16" height="18" x="4" y="4" rx="2" />
                        <path d="M8 10h6" />
                        <path d="M8 14h8" />
                        <path d="M8 18h5" />
                    </svg>
                    <span class="ml-2 text-xs lg:text-sm">LAPORAN REALTIME ABSENSI SISWA</span>
                </h2>

                <div class="mb-6 mt-2">
                    <label for="level" class="block text-sm font-medium text-gray-700">TINGKAT KELAS :</label>
                    <select id="level" name="level"
                        class="mt-1 block w-64 rounded-md border border-gray-300 p-2 px-4 py-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        <option value="">- Pilih Tingkat Kelas -</option>
                        <option value="I" {{ old('tingkat_kelas') == 'I' ? 'selected' : '' }}>- Tingkat I -</option>
                        <option value="II" {{ old('tingkat_kelas') == 'II' ? 'selected' : '' }}>- Tingkat II -</option>
                        <option value="III" {{ old('tingkat_kelas') == 'III' ? 'selected' : '' }}>- Tingkat III -
                        </option>
                        <option value="IV" {{ old('tingkat_kelas') == 'IV' ? 'selected' : '' }}>- Tingkat IV -</option>
                        <option value="V" {{ old('tingkat_kelas') == 'V' ? 'selected' : '' }}>- Tingkat V -</option>
                        <option value="VI" {{ old('tingkat_kelas') == 'VI' ? 'selected' : '' }}>- Tingkat VI -</option>
                        <option value="VII" {{ old('tingkat_kelas') == 'VII' ? 'selected' : '' }}>- Tingkat VII -
                        </option>
                        <option value="VIII" {{ old('tingkat_kelas') == 'VIII' ? 'selected' : '' }}>- Tingkat VIII -
                        </option>
                        <option value="IX" {{ old('tingkat_kelas') == 'IX' ? 'selected' : '' }}>- Tingkat IX -</option>
                        <option value="X" {{ old('tingkat_kelas') == 'X' ? 'selected' : '' }}>- Tingkat X -</option>
                        <option value="XI" {{ old('tingkat_kelas') == 'XI' ? 'selected' : '' }}>- Tingkat XI -
                        </option>
                        <option value="XII" {{ old('tingkat_kelas') == 'XII' ? 'selected' : '' }}>- Tingkat XII -
                        </option>
                    </select>
                </div>
            </div>

            <!-- Grid Card -->
            <div class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-3">

                @for ($i = 1; $i <= 6; $i++)
                    <div class="rounded-lg border bg-white p-6 shadow-md">
                        <h2
                            class="bg-gray-60000 focus:shadow-outline-blue mb-4 flex items-center rounded border p-3 font-semibold shadow focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-school">
                                <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                                <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                                <path d="M18 5v17" />
                                <path d="m4 6 8-4 8 4" />
                                <path d="M6 5v17" />
                                <circle cx="12" cy="9" r="2" />
                            </svg>
                            <span class="ml-2">Kelas X11</span>
                        </h2>
                        <!-- Tabel untuk Laki-laki dan Perempuan -->
                        <table class="mb-4 min-w-full table-auto border-separate border-spacing-2">
                            <tbody>
                                <tr>
                                    <td class="text-left text-sm font-medium text-gray-500">Laki-laki</td>
                                    <td class="text-left">:</td>
                                    <td class="text-left">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-blue-600 px-3 py-1 text-sm font-semibold text-white">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-sm font-medium text-gray-500">Perempuan</td>
                                    <td class="text-left">:</td>
                                    <td class="text-left">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-green-600 px-3 py-1 text-sm font-semibold text-white">0</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="inline-block min-w-full p-1.5 align-middle">
                                    <div class="overflow-hidden">
                                        <table
                                            class="min-w-full divide-y divide-gray-200 overflow-hidden rounded dark:divide-neutral-700">
                                            <thead class="bg-blue-600 text-white">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-medium uppercase dark:text-neutral-500">
                                                        NAMA SISWA</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-xs font-medium uppercase dark:text-neutral-500">
                                                        KEHADIRAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-neutral-800 dark:even:bg-neutral-700 dark:hover:bg-neutral-700">
                                                    <td
                                                        class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                        John Brown</td>
                                                    <td
                                                        class="whitespace-nowrap px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                                        45</td>
                                                </tr>
                                                <tr
                                                    class="odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-neutral-800 dark:even:bg-neutral-700 dark:hover:bg-neutral-700">
                                                    <td
                                                        class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                        Jim Green</td>
                                                    <td
                                                        class="whitespace-nowrap px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                                        27</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- Tabel Kehadiran -->
                        <table class="mb-4 mt-5 min-w-full table-auto border-separate border-spacing-2">
                            <tbody>
                                <tr>
                                    <td class="text-left text-sm font-medium text-gray-500">HADIR</td>
                                    <td class="text-left">:</td>
                                    <td class="text-left">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-blue-600 px-3 py-1 text-sm font-semibold text-white">0</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="text-left text-sm font-medium text-gray-500">TIDAK HADIR</td>
                                    <td class="text-left">:</td>
                                    <td class="text-left">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-green-600 px-3 py-1 text-sm font-semibold text-white">0</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-sm font-medium text-gray-500">IZIN</td>
                                    <td class="text-left">:</td>
                                    <td class="text-left">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-green-600 px-3 py-1 text-sm font-semibold text-white">0</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                @endfor

            </div>

        </div>
    </div>
@endsection

@push('addon-style')
    <!-- Tailwind CSS sudah terintegrasi -->
@endpush

@push('addon-script')
    <script>
        // Fungsi untuk mendapatkan hari dalam bahasa Indonesia
        function getIndonesianDay(dayIndex) {
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            return days[dayIndex];
        }

        // Fungsi untuk mendapatkan bulan dalam bahasa Indonesia
        function getIndonesianMonth(monthIndex) {
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];
            return months[monthIndex];
        }

        // Fungsi untuk memperbarui waktu
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            document.getElementById('current-time').innerText = timeString;

            // Mendapatkan hari dan tanggal
            const dayString = getIndonesianDay(now.getDay());
            const date = String(now.getDate()).padStart(2, '0');
            const month = getIndonesianMonth(now.getMonth());
            const year = now.getFullYear();
            const dateString = `${date} ${month} ${year}`;

            document.getElementById('current-day').innerText = dayString;
            document.getElementById('current-date').innerText = dateString;
        }

        setInterval(updateTime, 1000);
        updateTime(); // Memulai update saat halaman dimuat
    </script>
@endpush
