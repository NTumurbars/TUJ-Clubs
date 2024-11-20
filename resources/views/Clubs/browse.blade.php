<!-- resources/views/clubs/browse.blade.php -->

<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Browse Clubs</h1>

        @if ($clubs->isEmpty())
            <p class="text-center text-gray-600">There are no clubs available to join at this time.</p>
        @else
            {{-- https://tailwindcss.com/docs/grid-template-columns --}}
            <div class="grid grid-cols-3 gap-6">
                @foreach ($clubs as $club)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                        <div class="p-6 flex-1">
                            <h2 class="text-2xl font-semibold mb-2">{{ $club->name }}</h2>
                            <p class="text-zinc-700 mb-4">{{ Str::limit($club->bio) }}</p>
                            <p class="text-zinc-500 mb-4">{{ $club->memberships_count }} Members</p>
                        </div>
                        @auth
                            <div class="p-6 bg-gray-100">
                                <form action="{{ route('clubs.requestToJoin', $club) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-emerald-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-200">
                                        Request to Join
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
