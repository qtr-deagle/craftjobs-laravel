<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 border border-gray-200 shadow-md rounded-lg">
        <header class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800 uppercase mb-2">Login</h2>
            <p class="text-sm text-gray-600">Log into your account to post jobs</p>
        </header>

        {{-- Google Sign In --}}
        <div class="mb-6">
            <a href="{{ route('auth.google') }}"
               class="w-full flex items-center justify-center gap-2 bg-white border border-gray-300 rounded-md py-2 px-4 text-gray-700 hover:bg-gray-100 transition">
                <img src="/images/google-logo.png" alt="Google" class="w-5 h-5">
                Sign in with Google
            </a>
        </div>

        {{-- Divider --}}
        <div class="flex items-center mb-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-3 text-sm text-gray-500">OR</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <form method="POST" action="/users/authenticate">
            @csrf

            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="mb-6">
                <button type="submit"
                    class="w-full bg-gray-700 text-white font-semibold py-2 px-4 rounded-md hover:bg-black transition duration-200">
                    Sign In
                </button>
            </div>

            {{-- Register Link --}}
            <div class="text-center text-sm text-gray-600">
                Don't have an account?
                <a href="/register" class="text-black font-medium hover:underline">Register</a>
            </div>
        </form>
    </x-card>
</x-layout>