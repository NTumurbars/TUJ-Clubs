<x-layout>

    <div class="container">
        <h1>Edit Club</h1>

        <!-- if wrong inputs show the error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There were some problems with your input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clubs.update', $club) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Club Name</label>
                <br>
                <input type="text" name="name" class="form-control" value="{{ old('name', $club->name) }}" required>
                <br>
            </div>

            <div>
                <label for="bio">Club Description</label>
                <br>
                <textarea name="bio" class="form-control" rows="5">{{ old('bio', $club->bio) }}</textarea>
                <br>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Update Club</button>
        </form>
    </div>

</x-layout>
