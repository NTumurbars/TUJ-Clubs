<div class="bg-gradient-to-r from-[#491111] to-[#8B0000] shadow-lg  bg-opacity-60 rounded-lg">
    <nav class="px-6 sm:px-8 py-4 bg-gradient-to-r from-[#006f30] to-[#000000] shadow-lg  rounded-lg">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <h2 class="text-white font-semibold text-lg">{{ $user->name }}</h2>
        </div>
        <img class="h-14 w-14 rounded-full border-4 border-transparent hover:border-pink-500 transition-all duration-300"
            src="{{ $user->profile_photo_link ?? 'https://www.google.com/imgres?q=temple%20owl%20icon&imgurl=https%3A%2F%2Fbrandslogos.com%2Fwp-content%2Fuploads%2Fimages%2Flarge%2Ftemple-owls-logo.png&imgrefurl=https%3A%2F%2Fbrandslogos.com%2Ft%2Ftemple-owls-logo%2F&docid=9LD6o8DoD5nAYM&tbnid=9LX3xPPZImnTwM&vet=12ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA..i&w=1280&h=1280&hcb=2&ved=2ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA' }}"
            alt="User profile">
    </div>
</nav>

    <div class="relative h-screen bg-[#49111184] flex flex-col pb-16">
        <div class="flex-grow p-4 overflow-auto">
            <div class="msg-body space-y-4">
                <ul>
                    @foreach ($messages as $message)
                        @if ($message['sender'] != auth()->user()->name)
                            <li class="text-left">
                                <div class="inline-block bg-gradient-to-r from-[#2c2f33] to-[#264a2a]  p-3 rounded-lg max-w-xs shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                    <p class="text-white">{{ $message['message'] }}</p>
                                </div>
                            </li>
                        @else
                            <li class="text-right">
                                <div class="inline-block bg-gradient-to-r from-[#3a1c44] to-[#5d1e2f] p-3 rounded-lg max-w-xs shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                                    <p class="text-white">{{ $message['message'] }}</p>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-[#491111] to-transparent backdrop-blur-md bg-opacity-60">
            <form wire:submit="sendMessage()">
                <div class="flex items-center space-x-2">
                    <input type="text" wire:model="message" 
                        class="flex-grow p-3 rounded-full bg-transparent text-white placeholder-gray-400 border-2 border-transparent focus:border-pink-600 focus:ring-2 focus:ring-pink-500 focus:outline-none transition duration-300"
                        placeholder="Type a message..." aria-label="message...">
                    <button type="submit" 
                        class="p-3 bg-pink-600 text-white rounded-full hover:bg-pink-700 hover:scale-105 transition-transform focus:outline-none">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
