@extends('layouts.auth')

@section('content')
    <div class="flex min-h-screen items-center justify-center bg-blue-500">
        <div class="z-20 rounded-2xl bg-white px-12 py-12 shadow-xl">
            <div>
                <h1 class="mb-4 cursor-pointer text-center text-3xl font-bold">Masuk</h1>
                <p class="mb-8 w-80 cursor-pointer text-center text-sm font-semibold tracking-wide text-gray-700">Silahkan Masuk menggunakan NISN/NIP.</p>
            </div>

            <form method="POST" action="{{ route('admin.post') }}">
                @csrf

                <input type="number" name="username" placeholder="Username" value="{{ old('username') }}"
                    class="@error('username') border-red-500 @enderror block w-full rounded-lg border px-4 py-3 text-sm outline-blue-500" />
                @error('username')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <input type="password" name="password" placeholder="Password"
                    class="@error('password') border-red-500 @enderror mt-4 block w-full rounded-lg border px-4 py-3 text-sm outline-blue-500" />
                @error('password')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <div class="mt-4 flex items-center hidden">
                    <input type="checkbox" name="remember" id="remember" class="mr-2" checked>
                    <label for="remember" class="text-sm text-gray-700">Remember me</label>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit"
                        class="w-full rounded-lg bg-blue-600 py-2 text-xl text-white transition-all hover:bg-blue-700">Masuk</button>
                </div>
            </form>
        </div>

        <!-- dekorasi -->
        <div class="absolute right-12 top-0 hidden h-40 w-40 rounded-full bg-blue-400 md:block"></div>
        <div class="absolute bottom-20 left-10 hidden h-40 w-20 rotate-45 transform rounded-full bg-blue-400 md:block">
        </div>
    </div>
@endsection
