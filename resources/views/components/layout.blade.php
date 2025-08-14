<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico.png" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>CraftJobs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/">
            <img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" />
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span
                        class="inline-flex items-center gap-2 mt-4 px-5 py-2 bg-blue-600 text-white rounded-full shadow-md hover:shadow-lg transition duration-300 text-sm sm:text-base font-bold tracking-wide uppercase animate-fade-in">
                        <i class="fa-solid fa-hand-wave text-white animate-bounce-slow"></i>
                        Welcome {{ auth()->user() ? auth()->user()->name : 'Guest' }}
                    </span>
                </li>
                <li>
                    <a href="/listings/manage"
                        class="text-white mt-4 bg-black hover:bg-white hover:text-black py-2 px-5 border-2 border-black rounded-full shadow-md hover:shadow-lg transition duration-300 inline-flex items-center group">
                        <i class="fa-solid fa-gear text-white group-hover:text-black transition duration-300"></i>
                        <span class="ml-2 font-bold">Manage Listings</span>
                    </a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="text-white mt-4 bg-black hover:bg-white hover:text-black py-2 px-5 border-2 border-black rounded-full shadow-md hover:shadow-lg transition duration-300 group">
                            <i class="fa-solid fa-door-closed text-white group-hover:hidden transition duration-300"></i>
                            <i
                                class="fa-solid fa-door-open hidden group-hover:inline text-black transition duration-300"></i>
                            <span class="ml-2 font-bold">Logout</span>
                        </button>
                    </form>
                </li>
            @else
                <div class="flex space-x-4 mr-6">
                    <a href="/register"
                        class="mt-4 bg-black text-white hover:text-black py-2 px-5  border-2 border-black rounded-full shadow-md hover:shadow-lg transition duration-300 slide-transition">
                        <span class="md:text-sm lg:text-base text-white font-bold">Register</span>
                    </a>
                    <a href="/login"
                        class="mt-4 bg-black text-white hover:text-black py-2 px-5 border-2 border-black rounded-full shadow-md hover:shadow-lg transition duration-300 slide-transition">
                        <span class="md:text-sm lg:text-base text-white font-bold">Login</span>
                    </a>
                </div>

            @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-blue-500 text-white h-24 mt-24 opacity-90 md:justify-center">
        <a href="/listings/create"
            class="absolute top-1/3 right-10 rounded-full bg-white hover:shadow-[0_0_16px_4px_rgba(255,255,255,0.8)] transition duration-300">
            <span class="px-5 py-2 block text-black font-bold">Post Job</span>
        </a>
    </footer>
    <x-flashing-message />
</body>

</html>
