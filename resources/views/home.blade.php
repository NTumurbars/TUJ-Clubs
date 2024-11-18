<x-layout>

    @if (auth()->check())
        <div {{-- added some design. I think it looks good though.  --}}
            class="bg-green-50 border border-green-200 text-green-600 px-3 py-2 rounded-lg shadow-sm mb-3 text-sm font-medium">
            Welcome, {{ auth()->user()->name }}!
        </div>
    @else
        <div
            class="bg-blue-50 border border-blue-200 text-blue-600 px-3 py-2 rounded-lg shadow-sm mb-3 text-sm font-medium">
            Welcome, guest! <a href="/login" class="underline text-blue-500 hover:text-blue-700">Log in</a> to
            access
            club features.
        </div>
    @endif


    @auth
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold text-gray-800 mb-8">Club Announcements</h1>

            <div class="space-y-6">
                @forelse ($globalPosts as $post)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
                        <div class="flex items-center mb-4">
                            {{-- will add club avatar in club db once I figure out how to save picture --}}
                            <img class="w-12 h-12 rounded-full object-cover mr-4"
                                src="{{ $post->club->avatar ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa176-tAid4pc1T8-sMsYnxJ_QFyhXAahbOA&s' }}"
                                alt="{{ $post->club->name }}'s logo">

                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">{{ $post->club->name }}</h2>
                                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700">{{ $post->content }}</p>
                        </div>

                    </div>
                @empty
                    <p class="text-gray-600">No announcements available at the moment</p>
                @endforelse
            </div>
        </div>
    @endauth


</x-layout>
