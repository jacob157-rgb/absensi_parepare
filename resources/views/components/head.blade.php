{{-- Meta Tag --}}
@include('components.meta')
{{-- Title --}}
<title>{{ $pages ?? config('app.name', 'Absensi Pare Pare') }}</title>
{{-- favicon --}}
<link rel="icon" sizes="180x180" href="{{ asset('assets/img/favicon.ico') }}">
{{-- Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{--  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">  --}}
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<script src="//unpkg.com/alpinejs" defer></script>
<link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
{{-- Vite --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- jQuery --}}
<script src="{{ asset('assets/js/init-alpine.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fingerprintjs2@2.1.0/dist/fingerprint2.min.js"></script>
