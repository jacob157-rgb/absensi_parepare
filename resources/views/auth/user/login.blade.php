@extends('layouts.auth')

@section('content')
    <div class="relative items-center justify-center min-h-screen overflow-x-hidden bg-white lg:flex">
        <div class="w-full sm:w-2/4">
            <div class="flex flex-row justify-center mt-5 lg:hidden">
                <div class="flex flex-col justify-center m-2 text-center">
                    <img alt="" class="self-center flex-shrink-0 object-fill w-24"
                        src="{{ asset('assets/img/kemenag.png') }}">
                </div>
                <div class="flex flex-col justify-center m-2 text-center">
                    <img alt="" class="self-center flex-shrink-0 object-fill w-28"
                        src="{{ asset('assets/img/man2pare.png') }}">
                </div>
            </div>

            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <div
                    class="flex-col hidden space-y-4 lg:flex lg:mb-7 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                    <img class="object-fill h-20 sm:h-24" src="{{ asset('assets/img/kemenag.png') }}">
                    <img class="object-fill h-20 sm:h-24" src="{{ asset('assets/img/man2pare.png') }}">
                </div>

                <h1 class="text-xl font-bold leading-none sm:text-4xl ">
                    Aplikasi Absensi <br>
                    <span class="text-blue-600 truncate sm:text-5xl">MAN 2 KOTA PAREPARE</span>
                </h1>
                <p class="flex mt-4 mb-6 text-base sm:mt-6 sm:mb-8 sm:text-lg">
                    <span class="font-medium text-center">
                        <span class="text-xl font-semibold sm:text-2xl">"</span>
                        Mewujudkan Generasi Yang Unggul dan berakhlaqul karimah, Trampil dalam Berkarya, dan Amanah dalam
                        bersikap
                        <span class="text-xl font-semibold sm:text-2xl">"</span>
                    </span>
                </p>
            </div>
        </div>

        <div class="relative z-20 px-12 py-12 bg-white shadow-xl rounded-2xl">
            <h1 class="mb-4 text-xl font-semibold text-center cursor-pointer ">Masuk Untuk Melakukan Absensi</h1>
            <div class="flex items-center justify-center w-full">
                <div
                    class="flex w-full p-1 transition bg-gray-100 rounded-lg dark:bg-neutral-700 dark:hover:bg-neutral-600 hover:bg-gray-200">
                    <nav class="flex w-full gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                        <button type="button"
                            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-500 bg-transparent rounded-lg hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-400 active gap-x-2 hover:hover:text-blue-600 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:bg-white hs-tab-active:text-gray-700"
                            id="segment-item-1" aria-selected="true" data-hs-tab="#segment-1" aria-controls="segment-1"
                            role="tab">
                            Siswa
                        </button>
                        <button type="button"
                            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-500 bg-transparent rounded-lg hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-400 gap-x-2 hover:hover:text-blue-600 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:bg-white hs-tab-active:text-gray-700"
                            id="segment-item-2" aria-selected="false" data-hs-tab="#segment-2" aria-controls="segment-2"
                            role="tab">
                            Wali
                        </button>
                        <button type="button"
                            class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-gray-500 bg-transparent rounded-lg hs-tab-active:dark:bg-neutral-800 hs-tab-active:dark:text-neutral-400 gap-x-2 hover:hover:text-blue-600 hover:text-gray-700 focus:text-gray-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50 hs-tab-active:bg-white hs-tab-active:text-gray-700"
                            id="segment-item-3" aria-selected="false" data-hs-tab="#segment-3" aria-controls="segment-3"
                            role="tab">
                            Guru
                        </button>
                    </nav>
                </div>
            </div>

            <div class="mt-3">
                <div id="segment-1" role="tabpanel" aria-labelledby="segment-item-1">
                    <p class="w-full mb-5 text-sm font-semibold tracking-wide text-center text-gray-700 cursor-pointer ">
                        Silahkan Masuk menggunakan NIS/NISN.
                    </p>

                    <form id="loginForm" method="POST" action="{{ route('siswa.post') }}">
                        @csrf

                        <input type="text" inputmode="numeric" name="username" placeholder="NIS/NISN"
                            value="{{ old('username') }}"
                            class="@error('username') border-red-500 @enderror block w-full rounded-lg border px-4 py-3 text-sm outline-blue-500" />
                        @error('username')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="max-w-sm mt-4">
                            <div class="relative">
                                <input id="hs-toggle-password-siswa" type="password" name="password"
                                    class="@error('password') border-red-500 @enderror dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded-lg border py-3 pe-10 ps-4 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                    placeholder="Password" value="">
                                <button type="button"
                                    data-hs-toggle-password='{
                                    "target": "#hs-toggle-password-siswa"
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
                                        <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                            y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="unique_meta" id="fingerprint">


                        {{--  <div class="mt-6 text-center">
                            <button type="submit" id="submitButton"
                                class="w-full py-2 text-xl text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Masuk</button>
                        </div>  --}}
                        <div class="mt-6 text-center">
                            <button type="button" id="submitButton"
                                class="w-full py-2 text-xl text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Masuk</button>
                        </div>
                    </form>

                </div>
                <div id="segment-2" class="hidden" role="tabpanel" aria-labelledby="segment-item-2">
                    <p class="w-full mb-5 text-sm font-semibold tracking-wide text-center text-gray-700 cursor-pointer">
                        Silahkan Masuk menggunakan No. HP
                    </p>

                    <form method="POST" action="{{ route('wali.post') }}">
                        @csrf

                        <input type="text" inputmode="numeric" name="username" placeholder="No HP"
                            value="{{ old('username') }}"
                            class="@error('username') border-red-500 @enderror block w-full rounded-lg border px-4 py-3 text-sm outline-blue-500" />
                        @error('username')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="max-w-sm mt-4">
                            <div class="relative">
                                <input id="hs-toggle-password-wali" type="password" name="password"
                                    class="@error('password') border-red-500 @enderror dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded-lg border py-3 pe-10 ps-4 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                    placeholder="Password" value="">
                                <button type="button" data-hs-toggle-password='{"target": "#hs-toggle-password-wali"}'
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
                                            r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 text-center">
                            <button type="submit"
                                class="w-full py-2 text-xl text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Masuk</button>
                        </div>
                    </form>
                </div>
                <div id="segment-3" class="hidden" role="tabpanel" aria-labelledby="segment-item-3">
                    <p class="w-full mb-5 text-sm font-semibold tracking-wide text-center text-gray-700 cursor-pointer">
                        Silahkan Masuk menggunakan NIP.
                    </p>

                    <form method="POST" action="{{ route('guru.post') }}">
                        @csrf

                        <input type="text" inputmode="numeric" name="username" placeholder="NIP"
                            value="{{ old('username') }}"
                            class="@error('username') border-red-500 @enderror block w-full rounded-lg border px-4 py-3 text-sm outline-blue-500" />
                        @error('username')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                        <div class="max-w-sm mt-4">
                            <div class="relative">
                                <input id="hs-toggle-password-guru" type="password" name="password"
                                    class="@error('password') border-red-500 @enderror dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded-lg border py-3 pe-10 ps-4 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                                    placeholder="Password" value="">
                                <button type="button" data-hs-toggle-password='{"target": "#hs-toggle-password-guru"}'
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
                                            r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 text-center">
                            <button type="submit"
                                class="w-full py-2 text-xl text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!-- Dekorasi -->
        <div class="absolute hidden w-20 h-20 bg-blue-400 rounded-full right-12 md:block"></div>
        <div class="absolute top-0 hidden w-40 h-40 bg-blue-400 rounded-full right-12 md:block"></div>
        <div class="absolute hidden w-20 h-40 transform rotate-45 bg-blue-400 rounded-full bottom-20 left-10 md:block">
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
            setTimeout(function () {
                Fingerprint2.get(function(components) {
                    const values = components.map(function(component) { return component.value });
                    const fingerprint = Fingerprint2.x64hash128(values.join(''), 31);
                    console.log(fingerprint);

                    document.getElementById('fingerprint').value = fingerprint;
                });
            }, 500);

        });
    </script>
@endsection
