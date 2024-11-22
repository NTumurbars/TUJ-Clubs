<div>
    {{-- The Master doesn't talk, he acts. --}}


    <form wire:submit="submitMessage">
        @csrf
        <div class="form-group">
            <label for="name">Input something</label>
            <br>
            <input wire:model="message" type="text" name="name" class="form-control" />
        </div>

        <br>


        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
    <br>

    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Chat</h1>

        <div class="space-y-6">
            @forelse ($convo as $convoItem)
                <div class="card">
                    <div class="flex items-center mb-4">
                        {{-- will add club avatar in club db once I figure out how to save picture --}}
                        <img class="w-12 h-12 rounded-full object-cover mr-4"
                            src="{{ $convoItem['profile_photo_link'] ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa176-tAid4pc1T8-sMsYnxJ_QFyhXAahbOA&s' }}">

                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">{{ $convoItem['username'] }}</h2>
                            <p class="text-sm text-gray-500">{{ $convoItem['created_at']->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $convoItem['message'] }}</h3>

                    </div>

                </div>
            @empty
                <p class="text-gray-600">No announcements available at the moment</p>
            @endforelse
        </div>
    </div>


    {{-- <form wire:submit="submitMessage">
        <input wire:model="message" />
        <button type="submit">Send</button>
    </form> --}}




</div>
{{-- The guy used 
<x-text-input wire:model="message"
--}}
