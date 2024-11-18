<x-layout>
    <div class="container">
        <h2>Edit Post in {{ $club->name }}</h2>

        <form action="{{ route('posts.update', [$club, $post]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}"
                    required>

                @error('title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror"
                    required>{{ old('content', $post->content) }}</textarea>

                @error('content')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            @can('createGlobalClub', [$post, $club])
                <div class="form-group form-check mb-3">
                    <input type="checkbox" name="is_global" id="is_global" class="form-check-input"
                        {{ old('is_global', $post->is_global) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_global">Make this post global</label>
                </div>
            @endcan

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('clubs.display', $club) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-layout>