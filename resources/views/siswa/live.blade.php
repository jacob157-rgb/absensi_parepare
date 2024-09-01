@extends('layouts.siswa')
@section('content')
    <div class="flex flex-col my-4">
        <div class="-m-1.5">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded dark:border-neutral-700">
                    <h2
                        class="flex items-center p-3 m-3 my-6 font-semibold rounded shadow bg-gray-60000 focus:shadow-outline-blue focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-youtube">
                            <path
                                d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                            <path d="m10 15 5-3-5-3z" />
                        </svg>
                        <span class="ml-2">LIVE YOUTUBE</span>
                    </h2>
                    <div class="p-3">
                        <div class="relative flex justify-center items-center h-full">
                            {!! $live !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
    <script>
        function resizeIframe() {
            const iframe = document.getElementById('youtubeIframe');
            if (!iframe) {
                console.error('Iframe not found');
                return;
            }

            const containerWidth = iframe.parentElement.offsetWidth;

            iframe.width = containerWidth;
            iframe.height = containerWidth * 6 / 15;

            if (window.innerWidth <= 768) {
                iframe.style.width = '100%';
                iframe.style.height = 'auto';
            }
        }
        window.onload = resizeIframe;
        window.onresize = resizeIframe;
    </script>
@endpush
