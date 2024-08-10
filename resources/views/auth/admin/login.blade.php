@extends('layouts.auth')

@section('content')
    <div class="min-h-screen bg-purple-400 flex justify-center items-center">
        <div class="py-12 px-12 bg-white rounded-2xl shadow-xl z-20">
            <div>
                <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">Login</h1>
                <p class="w-80 text-center text-sm mb-8 font-semibold text-gray-700 tracking-wide cursor-pointer">Login to
                    access your account and enjoy all the services.</p>
            </div>

            <form method="POST" action="{{ route('admin.post') }}">
                @csrf

                <input type="number" name="username" placeholder="Username" value="{{ old('username') }}"
                    class="block text-sm py-3 px-4 rounded-lg w-full border @error('username') border-red-500 @enderror outline-purple-500" />
                @error('username')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <input type="password" name="password" placeholder="Password"
                    class="block text-sm py-3 px-4 rounded-lg w-full border @error('password') border-red-500 @enderror outline-purple-500 mt-4" />
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <div class="flex items-center mt-4">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-700">Remember me</label>
                </div>

                <div class="text-center mt-6">
                    <button type="submit"
                        class="w-full py-2 text-xl text-white bg-purple-400 rounded-lg hover:bg-purple-500 transition-all">Login</button>
                </div>
            </form>
        </div>

        <!-- dekorasi -->
        <div class="w-40 h-40 absolute bg-purple-300 rounded-full top-0 right-12 hidden md:block"></div>
        <div class="w-20 h-40 absolute bg-purple-300 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block">
        </div>
    </div>
@endsection
