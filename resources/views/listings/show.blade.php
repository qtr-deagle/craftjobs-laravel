<x-layout>
    @include('partials.search')

    <a href="/" class="inline-block ml-4 mb-4">
        <span class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-900 hover:bg-gray-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <line x1="6" y1="6" x2="18" y2="18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="6" y1="18" x2="18" y2="6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
        </span>
    </a>

    <div class="mx-4">
        <x-card class="p-10 max-w-4xl mx-auto bg-white border border-blue-200 shadow-md rounded-xl">
            <div class="flex flex-col items-center text-center">
                {{-- Logo --}}
                <img class="w-64 h-64 object-contain mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="{{ $listing->company }} Logo" />

                {{-- Title & Company --}}
                <h3 class="text-3xl font-bold text-blue-700 mb-2">{{ $listing->title }}</h3>
                <div class="text-lg text-gray-600 font-semibold mb-4">{{ $listing->company }}</div>

                {{-- Tags --}}
                <x-listing-tags :tagsCvs="$listing->tags" />

                {{-- Location --}}
                <div class="text-base text-gray-700 my-4 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-location-dot text-blue-600"></i>
                    <span>{{ $listing->location ?? 'Location not specified' }}</span>
                </div>

                <div class="border-t border-gray-200 w-full my-6"></div>

                {{-- Description --}}
                <div class="w-full text-left">
                    <h3 class="text-2xl font-bold text-blue-700 mb-4">Job Description</h3>
                    <div class="text-gray-700 text-base space-y-6 leading-relaxed">
                        {!! nl2br(e($listing->description)) !!}
                    </div>
                </div>

                {{-- Actions --}}
                <div class="mt-8 w-full flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:{{ $listing->email }}"
                        class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        <i class="fa-solid fa-envelope"></i> Contact Employer
                    </a>

                    <a href="{{ $listing->website }}" target="_blank"
                        class="flex items-center justify-center gap-2 bg-gray-800 hover:bg-black text-white font-semibold py-2 px-4 rounded-lg transition">
                        <i class="fa-solid fa-globe"></i> Visit Website
                    </a>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
