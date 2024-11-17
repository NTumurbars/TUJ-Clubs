{{-- this view will be the view inside the club --}}
{{-- I think this would be the simplest way to allow them to request to join club and manage clubs based on roles. No need to have separate view for request to join every one can go to a clubs display view and depending on who is viewing there will be different things. --}}
<x-layout>


    <div class="container">
        <h1>{{ $club->name }}</h1>
        <p>{{ $club->bio }}</p>
        <p>Members: {{ $club->memberships_count }}</p>

        <!-- Display Success and Error Messages if any -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- For Members and Admins -->
        @if (Auth::user()->can('view', $club))
            <!-- Edit and Delete Buttons -->
            @can('update', $club)
                <a href="{{ route('clubs.edit', $club) }}" class="btn btn-secondary">Edit Club</a>
            @endcan

            @can('delete', $club)
                <form action="{{ route('clubs.destroy', $club) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Club</button>
                </form>
            @endcan

            {{-- Club Posts --}}
            {{-- didnt check if it where club specific post or global post. I think this has both of those things from the club. But maybe better this way. 
            Can't tell until posts are developed --}}
            <h2 class="mt-4">Posts</h2>
            @foreach ($club->posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">
                            <small class="text-muted">Posted by {{ $post->user->name }} on
                                {{ $post->created_at->format('M d, Y') }}</small>
                        </p>
                    </div>
                </div>
            @endforeach

            <!-- Create Post Button -->
            {{-- this is super temprory from what I have seen people use can to check for permissions etc. Somehow I want to use can to allow faculity and leader members to post globally --}}
            @can('create', [App\Models\Post::class, $club])
                <a href="{{ route('posts.create', $club) }}" class="btn btn-primary">Create New Post</a>
            @endcan
        @else
            <!-- For Non-Members -->

            <p>You are not a member of this club.</p>
            @auth
                <form action="{{ route('clubs.requestToJoin', $club) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Request to Join</button>
                </form>

            @endauth
        @endif
    </div>

</x-layout>
