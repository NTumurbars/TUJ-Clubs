<x-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Club Information Section -->
        <div class="bg-gray-800 shadow-md rounded-lg p-6 mb-6">
            <div class="flex flex-row justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-200">{{ $club->name }}</h1>
                    <p class="mt-2 text-gray-400">{{ $club->bio }}</p>
                    <p class="mt-4 text-stone-300">Members: <span
                            class="font-medium">{{ $club->memberships_count }}</span>
                    </p>
                </div>
                <div class="flex space-x-2">
                    @can('update', $club)
                        <a href="{{ route('clubs.edit', $club) }}"
                            class="flex items-center px-3 py-2 bg-indigo-500 text-white rounded hover:bg-blue-600 transition">
                            <i class="mr-2"></i> Edit Club Details
                        </a>
                    @endcan

                    @can('delete', $club)
                        <form action="{{ route('clubs.destroy', $club) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this club?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center px-3 py-2 bg-rose-500 text-white rounded hover:bg-red-600 transition">
                                <i class="mr-2"></i> Delete Club
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Authorized Users Section -->
        @if (Auth::user()->can('view', $club))
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-700">Posts</h2>
                @can('create', $club)
                    <a href="{{ route('posts.create', $club) }}"
                        class="flex items-center px-4 py-2 bg-emerald-500 text-white rounded hover:bg-green-600 transition">
                        <i class="mr-2"></i> Create New Post
                    </a>
                @endcan
            </div>

            <div class="space-y-6">
                @forelse ($club->posts as $post)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
                        <div class="flex items-center mb-4">
                            {{-- will add club avatar in club db once I figure out how to save picture --}}
                            <img class="w-12 h-12 rounded-full object-cover mr-4"
                                src="{{ $post->user->profile_photo_link ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa176-tAid4pc1T8-sMsYnxJ_QFyhXAahbOA&s' }}"
                                alt="user photo">

                            <div>
                                <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                    {{ $post->user->name }}

                                    {{-- Display Role with Conditional Styling --}}
                                    <span
                                        class="{{ $post->user->getRoleColor($post->user->getRoleInClub($club->id)) }} ml-2 text-sm font-bold capitalize">
                                        {{ $post->user->getRoleInClub($club->id) }}
                                    </span>
                                </h2>
                                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700">{{ $post->content }}</p>
                        </div>

                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500">
                                Posted by <span class="font-medium">{{ $post->user->name }}</span> on
                                {{ $post->created_at->format('M d, Y') }}
                            </span>
                            <div class="flex space-x-2">
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', [$club, $post]) }}"
                                        class="flex items-center px-3 py-1 bg-indigo-500 text-white rounded hover:bg-blue-600 transition text-sm">
                                        <i class="mr-1"></i> Edit
                                    </a>
                                @endcan

                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', [$club, $post]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center px-3 py-1 bg-rose-500 text-white rounded hover:bg-red-600 transition text-sm">
                                            <i class="mr-1"></i> Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>

                    </div>
                @empty
                    <p class="text-gray-600">No posts available at the moment</p>
                @endforelse
            </div>
        @else
            <!-- Non-Members Section -->
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <p class="text-gray-700">You are not a member of this club.</p>
                @auth
                    <form action="{{ route('clubs.requestToJoin', $club) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                            <i class="mr-2"></i> Request to Join
                        </button>
                    </form>
                @endauth
            </div>
        @endif
    </div>
</x-layout>
