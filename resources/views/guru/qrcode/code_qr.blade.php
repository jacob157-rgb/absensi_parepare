@extends('layouts.qrcode')
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
                    KODE QR ABSENSI<br>
                    <span class="text-blue-600 truncate sm:text-5xl">{{ $sekolah->nama }}</span>
                </h1>
                <p class="flex mt-4 mb-6 text-base sm:mt-6 sm:mb-8 sm:text-lg">
                    <span class="font-medium text-center">
                        Kode QR akan diperbarui dalam <span id="countdown" class="font-bold">10</span> detik
                    </span>
                </p>

                <a href="/guru"
                    class="py-3 px-4 w-56 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-arrow-left">
                        <path d="m12 19-7-7 7-7" />
                        <path d="M19 12H5" />
                    </svg> Kembali Kedashboard
                </a>
            </div>
        </div>

        <div class="relative z-20 px-12 py-12 bg-white shadow-xl rounded-2xl">
            <div class="flex items-center justify-center w-full">
                <div
                    class="flex w-full p-1 transition bg-gray-100 rounded-lg dark:bg-neutral-700 dark:hover:bg-neutral-600 hover:bg-gray-200">
                    <div id="qrcode" class="w-100 h-100"></div>
                </div>
            </div>
            <div id="loading" class="hidden spinner mx-auto mt-4"></div>
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
                fetch("{{ route('guru.postQrResponse') }}", {
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
                            console.log(data)
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
    </script>
@endpush
