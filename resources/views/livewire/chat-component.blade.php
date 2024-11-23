<div>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Logo and Main Navigation Links -->
                <div class="flex items-center">
                    <div class="ml-6">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>

                <!-- Authentication Links -->
                <div class="flex items-center pr-2">
                    <!-- Profile Dropdown for Authenticated Users -->
                    <div class="relative ml-3">
                        <button type="button"
                            class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-14 w-14 rounded-full"
                                src="{{ $user->profile_photo_link ?? 'https://www.google.com/imgres?q=temple%20owl%20icon&imgurl=https%3A%2F%2Fbrandslogos.com%2Fwp-content%2Fuploads%2Fimages%2Flarge%2Ftemple-owls-logo.png&imgrefurl=https%3A%2F%2Fbrandslogos.com%2Ft%2Ftemple-owls-logo%2F&docid=9LD6o8DoD5nAYM&tbnid=9LX3xPPZImnTwM&vet=12ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA..i&w=1280&h=1280&hcb=2&ved=2ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA' }}"
                                alt="User profile">
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="hidden absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                                Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="bg-[#49111184] relative h-screen">
        <div class="modal-body">
            <div class="msg-body">
                <ul>
                    @foreach ($messages as $message)
                        @if ($message['sender'] != auth()->user()->name)
                            <li class="text-left text-white">
                                <p>{{$message['message']}}</p>
                            </li>
                        @else
                            <li class="text-right text-white">
                                <p>{{$message['message']}}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <form wire:submit="sendMessage()">
                <input type="text" wire:model="message" class="form-control" aria-label="message..."
                    placeholder="Write your message">
                <button type="submit" class=" bg-black  rounded-md text-white"><i
                        class="fa fa-paper-plane"></i>Send</button>
            </form>
        </div>
    </div>

</div>
