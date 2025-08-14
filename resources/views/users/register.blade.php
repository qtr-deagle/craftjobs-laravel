<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 border border-gray-200 shadow-md rounded-lg">
        <header class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800 uppercase mb-2">Create Your Account</h2>
            <p class="text-sm text-gray-600">Create an account to post jobs</p>
        </header>

        {{-- Google Sign Up --}}
        <div class="mb-6">
            <a href="{{ route('auth.google') }}"
               class="w-full flex items-center justify-center gap-2 bg-white border border-gray-300 rounded-md py-2 px-4 text-gray-700 hover:bg-gray-100 transition">
                <img src="/images/google-logo.png" alt="Google" class="w-5 h-5">
                Sign Up with Google
            </a>
        </div>

        {{-- Divider --}}
        <div class="flex items-center mb-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-3 text-sm text-gray-500">OR</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <form method="POST" action="/users">
            @csrf

            {{-- Name --}}
            <div class="mb-5">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Your Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Your Email</label>
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
                <p class="text-xs text-gray-500 mt-1">Must be at least 8 characters</p>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-5">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Terms Checkbox --}}
            <div class="mb-6 flex items-start">
                <input type="checkbox" name="terms" id="terms" class="mt-1 mr-2">
                <label for="terms" class="text-sm text-gray-700">
                    I agree to the <a href="/terms" class="text-blue-500 font-medium hover:underline">Terms & Conditions</a>
                </label>
            </div>

            {{-- Submit Button --}}
            <div class="mb-6">
                <button type="submit"
                    class="w-full bg-gray-700 text-white font-semibold py-2 px-4 rounded-md hover:bg-black transition duration-200">
                    Register
                </button>
            </div>

            {{-- Login Link --}}
            <div class="text-center text-sm text-gray-600">
                Already have an account?
                <a href="/login" class="text-black font-medium hover:underline">Login</a>
            </div>
        </form>
    </x-card>
</x-layout>