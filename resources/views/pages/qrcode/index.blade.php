@extends('layouts.qrcode')

@section('section')
    <div class="relative flex min-h-screen items-center justify-center border">
        <div class="z-20 rounded-2xl border bg-white px-12 py-12 shadow">
            <div>
                <h1 class="mb-4 cursor-pointer text-center text-3xl font-bold">Masuk Halaman Absensi</h1>
            </div>

            <form method="POST" action="{{ route('pages.codeqrPost') }}">
                @csrf
                <!-- Dropdown Sekolah -->
                <div class="mt-4 max-w-sm">
                    <label for="sekolah" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Sekolah</label>
                    <select id="sekolah" name="sekolah_id"
                        class="mt-1 block w-full rounded borderpy-3 pe-10 ps-4  shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:focus:ring-blue-600 sm:text-sm">
                        <option value="">Pilih Sekolah</option>
                        @foreach ($sekolah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('sekolah_id')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4 max-w-sm">
                    <label for="sekolah" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Password</label>
                    <div class="relative">
                        <input id="hs-toggle-password-admin" type="password" name="password"
                            class="@error('password') border-red-500 @enderror block w-full rounded border py-3 pe-10 ps-4 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Password" value="">
                        <button type="button" data-hs-toggle-password='{"target": "#hs-toggle-password-admin"}'
                            class="absolute inset-y-0 end-0 z-20 flex cursor-pointer items-center rounded-e-md px-3 text-gray-400 focus:text-blue-600 focus:outline-none dark:text-neutral-600 dark:focus:text-blue-500">
                            <svg class="size-3.5 shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path class="hs-password-active:hidden"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path class="hs-password-active:hidden"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                </path>
                                <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                    y2="22"></line>
                                <path class="hs-password-active:block hidden"
                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle class="hs-password-active:block hidden" cx="12" cy="12" r="3">
                                </circle>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-6 text-center">
                    <button type="submit"
                        class="w-full rounded bg-blue-600 py-2 text-xl text-white transition-all hover:bg-blue-700">Masuk</button>
                </div>
            </form>

        </div>

        <!-- dekorasi -->
        <div class="absolute right-12 top-0 hidden h-40 w-40 rounded-full bg-blue-400 md:block"></div>
        <div class="absolute bottom-20 left-10 hidden h-40 w-20 rotate-45 transform rounded-full bg-blue-400 md:block">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('input[name="username"]').on('input', function() {
                var value = $(this).val();
                var numericValue = value.replace(/[^0-9]/g, '');
                if (value !== numericValue) {
                    $(this).val(numericValue);
                    alert('Hanya menerima input angka.');
                }
            });
        });
    </script>
@endsection
