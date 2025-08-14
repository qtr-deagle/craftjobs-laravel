<x-layout>
    <x-card class="p-10 max-w-4xl mx-auto mt-24 bg-white border border-blue-200 shadow-md rounded-xl">
        <header class="mb-8">
            <h1 class="text-3xl text-center font-bold text-blue-700 uppercase tracking-wide">
                Manage Jobs
            </h1>
        </header>

        <table class="w-full table-auto text-sm text-left border-collapse">
            <thead>
                <tr class="bg-blue-50 text-blue-700 uppercase text-xs tracking-wider">
                    <th class="px-6 py-3 border-b border-blue-200">Title</th>
                    <th class="px-6 py-3 border-b border-blue-200">Edit</th>
                    <th class="px-6 py-3 border-b border-blue-200">Delete</th>
                </tr>
            </thead>
            <tbody>
                @unless ($listings->isEmpty())
                    @foreach ($listings as $listing)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 border-b border-gray-200 font-medium text-gray-800">
                                <a href="{{ route('listings.show', $listing->id) }}" class="hover:underline text-blue-600">
                                    {{ $listing->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                <a href="{{ route('listings.edit', $listing->id) }}"
                                    class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-semibold">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200">
                                <form action="{{ route('listings.destroy', $listing->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="inline-flex items-center gap-2 text-red-600 hover:text-red-800 font-semibold">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                            No Listings Found
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
