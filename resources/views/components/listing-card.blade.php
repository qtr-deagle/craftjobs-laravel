<x-card class="hover:shadow-lg hover:border-blue-400 transition cursor-pointer">
    <a href="/listings/{{ $listing->id }}" class="block">
        <div class="flex">
            <img class="hidden w-48 mr-6 md:block"
                src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                alt="{{ $listing->company }} Logo" />
            <div>
                <h3 class="text-2xl text-blue-700 font-bold mb-1">
                    {{ $listing->title }}
                </h3>
                <div class="text-xl font-semibold text-gray-700 mb-4">
                    {{ $listing->company }}
                </div>
                <x-listing-tags :tagsCvs="$listing->tags" />
                <div class="text-lg mt-4 text-gray-600 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-blue-500"></i>
                    {{ $listing->location }}
                </div>
            </div>
        </div>
    </a>
</x-card>