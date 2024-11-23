<x-layout>
<div class="max-w-full mx-auto px-4">
    <div class="mb-4 flex items-center">
        <input 
            type="text" 
            id="search" 
            class="w-full sm:w-3/4 px-4 py-2 rounded-lg bg-gray-700 text-white border-2 border-rose-500 focus:outline-none focus:ring-2 focus:ring-rose-500"
            placeholder="Search for users..." 
            onkeyup="filterUsers()" required>
        <button 
            id="clear-search" 
            class="ml-4 px-4 py-2 bg-rose-500 text-white rounded-lg hover:bg-rose-400 transition duration-200"
            onclick="">
            Search
        </button>
    </div>
    <div>
        <div>
            <div>
                <ul class="space-y-4">
                    @foreach ($users as $user)
                        <li class="flex justify-between gap-x-6 py-5 bg-[#00000090] rounded-xl border-2 transform transition duration-200 hover:scale-95 hover:cursor-pointer">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="size-12 flex-none rounded-full bg-gray-50"
                                    src="{{ $user->profile_photo_link }}"
                                    alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm/6 font-semibold text-white">{{ $user->name }}</p>
                                    <p class="mt-1 truncate text-xs/5 text-[#a29e9e]">{{ $user->email }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</x-layout>
