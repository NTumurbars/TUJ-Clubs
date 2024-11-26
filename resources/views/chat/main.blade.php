<x-layout>
    <div class="max-w-full mx-auto px-4 py-6">
        <div class="mb-4 flex items-center justify-between">
            <input type="text" id="search"
                class="w-full sm:w-3/4 px-4 py-2 rounded-lg bg-gray-800 text-white border-2 border-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500"
                placeholder="Search for users..." onkeyup="filterUsers()" required>
            <button id="clear-search"
                class="ml-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-500 transition duration-200">
                Search
            </button>
        </div>
        <div>
            <ul class="space-y-4">
                @foreach ($users as $user)
                    <li class="flex justify-between gap-x-6 py-5 bg-[#00000090] rounded-xl border-2 border-pink-600 transform transition duration-200 hover:scale-95 hover:cursor-pointer">
                        <a href="{{ route('chatView', $user->id) }}" class="flex min-w-0 gap-x-4 w-full">
                            <img class="h-14 w-14 flex-none rounded-full bg-gray-50" src="{{ $user->profile_photo_link }}" alt="User profile">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold text-white">{{ $user->name }}</p>
                                <p class="mt-1 truncate text-xs text-[#d1d5db]">{{ $user->email }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
