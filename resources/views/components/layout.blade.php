<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel App') }}</title>
    @vite(['resources/css/app.css', 'resources/js/calendar.js', 'resources/js/navbar.js'])

</head>

<body class="text-white bg-gradient-to-r from-[#a90e0e] via-[#290000] to-black">
    <nav class="bg-gradient-to-r from-[#7a0000] via-[#290000] to-black shadow-lg backdrop-blur-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Logo and Main Navigation Links -->
                <div class="flex items-center">
                    <img class="h-14 w-auto"
                        src="https://images.squarespace-cdn.com/content/v1/5eb491d611335c743fef24ce/1660015707372-82KYP79V8RSLKZR65R61/tuj_logo.png"
                        alt="TUJ Logo">
                    <div class="ml-6">
                        <div class="flex space-x-4">

                            <a href="{{ route('home') }}"
                                class="rounded-md bg-transparent px-3 py-2 text-sm font-medium text-white hover:text-pink-300 transition duration-200">Home</a>
                            <a href="{{ route('clubs.main') }}"
                                class="rounded-md bg-transparent px-3 py-2 text-sm font-medium text-white hover:text-pink-300 transition duration-200">Clubs</a>
                            <a href="{{ route('calendar') }}"
                                class="rounded-md bg-transparent px-3 py-2 text-sm font-medium text-white hover:text-pink-300 transition duration-200">Calendar</a>
                            <a href="{{ route('chat') }}"
                                class="rounded-md bg-transparent px-3 py-2 text-sm font-medium text-white hover:text-pink-300 transition duration-200">Chats</a>
                        </div>
                    </div>
                </div>

                <!-- Authentication Links -->
                <div class="flex items-center pr-2">
                    @guest
                        <!-- Sign In Button for Guests -->
                        <a href="{{ route('login') }}"
                            class="rounded-md bg-pink-600 px-3 py-2 text-sm font-medium text-white hover:bg-pink-700 transition duration-200">Sign In</a>
                    @endguest

                    @auth
                        <!-- Profile Dropdown for Authenticated Users -->
                        <div class="relative ml-3">
                            <button type="button"
                                class="flex rounded-full bg-transparent text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-red-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-14 w-14 rounded-full"
                                    src="{{ Auth::user()->profile_photo_link ?? 'https://www.google.com/imgres?q=temple%20owl%20icon&imgurl=https%3A%2F%2Fbrandslogos.com%2Fwp-content%2Fuploads%2Fimages%2Flarge%2Ftemple-owls-logo.png&imgrefurl=https%3A%2F%2Fbrandslogos.com%2Ft%2Ftemple-owls-logo%2F&docid=9LD6o8DoD5nAYM&tbnid=9LX3xPPZImnTwM&vet=12ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA..i&w=1280&h=1280&hcb=2&ved=2ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA' }}"
                                    alt="User profile">
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="hidden absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white  py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-pink-100" role="menuitem">Your Profile</a>
                                <form method="get" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-pink-100"
                                        role="menuitem">Log out</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8 px-4 mx-auto max-w-screen-lg bg-gradient-to-t from-[#320F23] to-[#491111] rounded-lg shadow-lg">
        {{ $slot }}
    </main>
</body>

</html>
