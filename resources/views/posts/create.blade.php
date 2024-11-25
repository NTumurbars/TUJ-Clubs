<x-layout>
    <div class="container">
        <h2>Create New Post in {{ $club->name }}</h2>

        <form action="{{ route('posts.save', $club) }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>

                @error('title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror"
                    required>{{ old('content') }}</textarea>

                @error('content')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            {{-- https://laravel.com/docs/11.x/authorization#policy-methods --}}


            @can('createGlobalClub', [App\Models\Post::class, $club])
                <div class="form-group mb-3">

                    <label class="form-start-date-label" for="start_date">Assign Start Date</label>
                    <input type="date" name="start_date" id="start_date">

                </div>

                <div class="form-group form-check mb-3">

                    <input type="checkbox" name="is_global" id="is_global" class="form-check-input" value="1"
                        {{ old('is_global') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_global">Make this post global</label>
                </div>
            @endcan

            <button type="submit" class="btn btn-primary">Create Post</button>
            <a href="{{ route('clubs.display', $club) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-layout>
