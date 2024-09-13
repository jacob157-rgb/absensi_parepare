@extends('layouts.admin')
@section('content')
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        UPDATE PASSWORD {{ $pages }}
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded shadow-md dark:bg-gray-800">
        <form action="{{ route('settings.admin.postProfil') }}" method="POST">
            @csrf

            <!-- Password Old -->
            <label class="block text-sm mb-4">
                <span class="font-semibold text-gray-700 dark:text-gray-400">Password Lama</span>
                <div class="relative">
                    <input id="hs-toggle-password-old" type="password" name="password_old"
                        class="block w-full py-2 mt-1 text-sm border-gray-200 rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                        placeholder="Masukan Password Lama" value="" required>
                    @error('password_old')
                        <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                    @enderror
                    <button type="button"
                        data-hs-toggle-password='{
                                "target": "#hs-toggle-password-old"
                              }'
                        class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer dark:text-neutral-600 dark:focus:text-blue-500 end-0 rounded-e-md focus:text-blue-600 focus:outline-none">
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
                            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                            </path>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                            </circle>
                        </svg>
                    </button>
                </div>
            </label>

            <!-- Password New -->
            <label class="block text-sm mb-4">
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
                            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                            </path>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                            </circle>
                        </svg>
                    </button>
                </div>
            </label>

            <!-- Password New -->
            <label class="block text-sm mb-4">
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
                            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                            </path>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                            </circle>
                        </svg>
                    </button>
                </div>
            </label>


            <!-- Button Save -->
            <div class="mb-4">
                @include('components.button_save')
            </div>
        </form>
    </div>
@endsection
