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

        <div class="container">

            {{-- maybe we should give a good name for this. I think global announcement is too dry but I will leave it for you guys to decide --}}
            <h1>Global Announcements</h1>
            {{-- announcements are not made yet --}}
            @foreach ($globalPosts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">
                            {{-- I have learned that we can use format format the dates it was wierd when it was YYYY MM DD but we may not even need th year --}}
                            <small class="text-muted">Posted by {{ $post->club->name ?? $post->user->name }} on
                                {{ $post->created_at->format('M d, Y') }}</small>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endauth


</x-layout>
