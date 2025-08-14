@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-blue-900 text-white px-6 py-3 rounded-lg shadow-lg border border-blue-800 z-50 pointer-events-none">
        <p class="text-sm font-semibold tracking-wide">
            {{ session('message') }}
        </p>
    </div>
@endif
