{{-- hmm for now only the admin can create clubs --}}

<x-layout>

    <div class="container">
        <h1>Create New Club</h1>

        <!-- if wrong inputs show error -->
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

        <form action="{{ route('clubs.save') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Club Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="bio">Club Description</label>
                <textarea name="bio" class="form-control" rows="5">{{ old('bio') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Club</button>
        </form>
    </div>

</x-layout>
