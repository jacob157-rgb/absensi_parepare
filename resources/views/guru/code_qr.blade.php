@extends('layouts.guru')
@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Scan QR Code</h2>
                <!-- QR Code -->
                <div class="flex justify-center mb-6">
                    {!! $qrCode !!}
                </div>
                <!-- Form -->
                <form id="absenForm" action="{{ route('guru.storeAbsen') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nik" id="qrDataInput">
                    <input type="hidden" value="{{ $guru->id }}" name="guru_id">
                    <input type="hidden" value="{{ $lembaga->code_unique }}" name="code_unique">
                    <button type="submit" id="submitButton" class="hidden">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ asset('assets/js/times.js') }}"></script>
@endpush
