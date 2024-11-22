<x-layout>
    <div class="container mx-auto px-4 py-8">
        {{-- club internal area --}}



        <div class="bg-gray-800 shadow-md rounded-lg p-6 mb-6">
            <div class="flex flex-row justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-200">{{ $club->name }}</h1>
                    <p class="mt-2 text-gray-400">{{ $club->bio }}</p>
                    <p class="mt-4 text-stone-300">Members: <span
                            class="font-medium">{{ $club->memberships_count }}</span>
                    </p>
                </div>


                {{-- we first need to check if they should see the button thats why canany is here --}}
                <div class="relative">
                    @canany(['update', 'delete', 'viewMembers', 'viewMemberRequests'], $club)
                        <button id="options-button"
                            class="flex items-center px-4 py-2 bg-sky-700 text-gray-200 rounded hover:bg-sky-900 focus:outline-none">
                            <span>Options</span>
                        </button>

                        <ul id="options-dropdown"
                            class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-md shadow-lg hidden z-20">
                            @can('view', $club)
                                <li>
                                    <a href="{{ route('clubs.members', $club) }}"
                                        class="block px-4 py-3 text-gray-800 hover:bg-gray-100">
                                        Members
                                    </a>
                                </li>
                            @endcan

                            @can('view', $club)
                                <li>
                                    <a href="#" class="block px-4 py-3 text-gray-800 hover:bg-gray-100">
                                        New Member Requests
                                    </a>
                                </li>
                            @endcan

                            @can('update', $club)
                                <li>
                                    <a href="{{ route('clubs.edit', $club) }}"
                                        class="block px-4 py-3 text-gray-800 hover:bg-gray-100">
                                        Edit Club Details
                                    </a>
                                </li>
                            @endcan

                            @can('delete', $club)
                                <li>
                                    <form action="{{ route('clubs.destroy', $club) }}" method="POST"
                                        onsubmit="return confirm('Do you really want to delete this club?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-3 text-gray-800 hover:bg-gray-100">
                                            Delete Club
                                        </button>
                                    </form>
                                </li>
                            @endcan
                        </ul>
                    @endcanany
                </div>

            </div>
        </div>






        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Only Club member section --}}
        @if (Auth::user())
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-700">Posts</h2>
                @can('createClub', [App\Models\Post::class, $club])
                    <a href="{{ route('posts.create', $club) }}" class="btn btn-create">
                        <i class="mr-2"></i> Create New Post
                    </a>
                @endcan
            </div>

            <div class="space-y-6">
                @forelse ($club->posts as $post)
                    <div class="card">
                        {{-- the card header contains profile picture name and edit and delete button --}}
                        <div class="card-header">
                            <div class="flex items-center">
                                {{-- the profile pciture --}}
                                <img class="w-12 h-12 rounded-full object-cover mr-4"
                                    src="{{ $post->user->profile_photo_link ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa176-tAid4pc1T8-sMsYnxJ_QFyhXAahbOA&s' }}"
                                    alt="user photo">

                                {{-- member information --}}
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                        {{ $post->user->name }}
                                        <span
                                            class="{{ $post->user->getRoleColor($post->user->getRoleInClub($club->id)) }} ml-2 text-sm font-bold capitalize">
                                            {{ $post->user->getRoleInClub($club->id) }}
                                        </span>
                                    </h2>
                                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', [$club, $post]) }}" class="btn btn-edit">
                                        <i class="mr-1"></i> Edit
                                    </a>
                                @endcan

                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', [$club, $post]) }}" method="POST"
                                        onsubmit="return confirm('Do you really want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">
                                            <i class="mr-1"></i> Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>


                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700">{{ $post->content }}</p>
                        </div>

                    </div>
                @empty
                    <p class="text-gray-600">No posts available at the moment</p>
                @endforelse
            </div>
        @else
            {{-- For non members the club will show the request to join --}}
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

    @vite(['resources/js/app.js', 'resources/js/dropdown.js'])
</x-layout>
