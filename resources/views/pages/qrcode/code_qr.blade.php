@extends('layouts.qrcode')
@section('content')
    <div class="relative min-h-screen items-center justify-center overflow-x-hidden bg-white lg:flex">
        <div class="w-full sm:w-2/4">
            <div class="mt-5 flex flex-row justify-center lg:hidden">
                <div class="m-2 flex flex-col justify-center text-center">
                    <img alt="" class="w-24 flex-shrink-0 self-center object-fill"
                        src="{{ asset('assets/img/kemenag.png') }}">
                </div>
                <div class="m-2 flex flex-col justify-center text-center">
                    <img alt="" class="w-28 flex-shrink-0 self-center object-fill"
                        src="{{ asset('assets/img/man2pare.png') }}">
                </div>
            </div>

            <div class="flex flex-col justify-center rounded-sm p-6 text-center lg:max-w-md lg:text-left xl:max-w-lg">
                <div
                    class="hidden flex-col space-y-4 sm:flex-row sm:items-center sm:justify-center sm:space-x-4 sm:space-y-0 lg:mb-7 lg:flex lg:justify-start">
                    <img class="h-20 object-fill sm:h-24" src="{{ asset('assets/img/kemenag.png') }}">
                    <img class="h-20 object-fill sm:h-24" src="{{ asset('assets/img/man2pare.png') }}">
                </div>

                <h1 class="text-xl font-bold leading-none sm:text-4xl">
                    KODE QR ABSENSI<br>
                    <span class="truncate text-blue-600 sm:text-5xl">{{ $sekolah->nama }}</span>
                </h1>
                <p class="mb-6 mt-4 flex text-center text-base sm:mb-8 sm:mt-6 sm:text-lg">
                    <span class="text-center font-medium">
                        Kode QR akan diperbarui dalam <span id="countdown" class="font-bold">10</span> detik
                    </span>
                </p>

                <div class="flex align-middle gap-x-0.5 p-2">
                    <!-- Kembali Kedashboard Button -->
                    <a href="/"
                        class="inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-4 py-3 text-xs font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 md:w-56 lg:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-arrow-left">
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                        <span class="text-center">Kembali Kedashboard</span>
                    </a>

                    <!-- FullScreen Button -->
                    <button id="fullscreenBtn"
                        class="inline-flex items-center gap-x-2 ml-2 rounded-lg border border-gray-200 bg-blue-500 px-4 py-3 text-xs font-medium text-white shadow-sm hover:bg-blue-600 focus:bg-blue-600 focus:outline-none disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 md:w-40 lg:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-presentation">
                            <path d="M2 3h20" />
                            <path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3" />
                            <path d="m7 21 5-5 5 5" />
                        </svg>
                        <span class="text-center">FullScreen</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="relative z-20 rounded-2xl bg-white px-12 py-12 shadow-xl">
            <div class="flex w-full items-center justify-center">
                <div
                    class="flex w-full rounded-lg  p-1 transition hover:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600">
                    <div id="qrcode" class="w-100 h-100"></div>
                </div>
            </div>
            <div id="loading" class="spinner mx-auto mt-4 hidden"></div>
        </div>
    </div>
@endsection

@push('addon-style')
    <style>
        .spinner {
            border: 6px solid rgba(0, 0, 0, 0.1);
            border-left-color: #4A5568;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        h1,
        h2 {
            text-transform: uppercase;
        }

        /* QR Code styling */
        #qrcode {
            border: 4px solid #4A5568;
            padding: 20px;
            background: #ffffff;
            border-radius: 15px;
        }
    </style>
@endpush




@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        var qrCodeElem = document.getElementById("qrcode");
        var countdownElem = document.getElementById("countdown");
        var loadingElem = document.getElementById("loading");

        var qrcode = new QRCode(qrCodeElem, {
            text: generateRandomCode(),
            width: 300,
            height: 300
        });

        var intervalTime = 10;
        var countdown = intervalTime;

        function generateRandomCode() {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var code = '';
            for (var i = 0; i < 16; i++) {
                code += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return code;
        }

        function updateQRCode() {
            showLoading();
            var newCode = generateRandomCode();
            setTimeout(function() {
                fetch("{{ route('pages.postQrResponse') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            code_unique: newCode
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            qrcode.makeCode(newCode);
                            countdownElem.innerHTML = intervalTime;
                            hideLoading();
                        } else {
                            console.error('Failed to update QR code:', data);
                            hideLoading();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        hideLoading();
                    });
            }, 1000);
        }

        function showLoading() {
            loadingElem.classList.remove("hidden");
            qrCodeElem.classList.add("hidden");
        }

        function hideLoading() {
            loadingElem.classList.add("hidden");
            qrCodeElem.classList.remove("hidden");
        }

        function updateCountdown() {
            countdown--;
            countdownElem.innerHTML = countdown;
            if (countdown === 0) {
                updateQRCode();
                countdown = intervalTime;
            }
        }

        setInterval(updateCountdown, 1000);
        updateQRCode();


        document.getElementById("fullscreenBtn").addEventListener("click", function() {
            // Check if the browser is already in fullscreen mode
            if (!document.fullscreenElement) {
                // Enter fullscreen mode
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) { // Firefox
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) { // Chrome, Safari and Opera
                    document.documentElement.webkitRequestFullscreen();
                } else if (document.documentElement.msRequestFullscreen) { // IE/Edge
                    document.documentElement.msRequestFullscreen();
                }
            } else {
                // Exit fullscreen mode
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari and Opera
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // IE/Edge
                    document.msExitFullscreen();
                }
            }
        });
    </script>
@endpush
