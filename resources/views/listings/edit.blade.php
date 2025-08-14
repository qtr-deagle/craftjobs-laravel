<x-layout>

    <a href="/" class="inline-block ml-4 mb-4">
        <span class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-900 hover:bg-gray-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19l-7-7 7-7" />
            </svg>
        </span>
    </a>

    <x-card class="p-10 max-w-lg mx-auto mt-auto bg-white border border-blue-200 shadow-md rounded-xl">
        <header class="text-center mb-8">
            <h2 class="text-3xl font-bold text-blue-700 uppercase tracking-wide mb-2">
                Edit Job
            </h2>
            <p class="text-gray-600 text-sm">Editing: <span class="font-semibold">{{ $listing->title }}</span></p>
        </header>

        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Company Name --}}
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                <input type="text" name="company" value="{{ $listing->company }}"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Job Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                <input type="text" name="title" value="{{ $listing->title }}"
                    placeholder="Example: Senior Laravel Developer"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Location --}}
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Job Location</label>
                <input type="text" name="location" value="{{ $listing->location }}"
                    placeholder="Example: Remote, Boston MA, etc"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Contact Email</label>
                <input type="text" name="email" value="{{ $listing->email }}"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Website --}}
            <div>
                <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website/Application
                    URL</label>
                <input type="text" name="website" value="{{ $listing->website }}"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tags --}}
            <div>
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags (Comma
                    Separated)</label>
                <input type="text" name="tags" value="{{ $listing->tags }}"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Logo --}}
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Company Logo</label>
                <input type="file" name="logo"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm" />
                <img class="w-32 h-32 object-contain mx-auto mt-4"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="{{ $listing->company }} Logo" />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Job Description</label>
                <textarea name="description" rows="8" placeholder="Include tasks, requirements, salary, etc"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-blue-500 p-3 text-sm resize-none">{{ $listing->description }}</textarea>
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold -mt-4 py-2 px-6 rounded-lg transition">
                    Update Job
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
