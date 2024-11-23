<x-layout>
    <h1>Join {{ $club->name }}</h1>

    <form action="{{ route('requests.save', $club) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="answer">{{ $joinForm->question }}</label>
            <br>
            <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea>
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>
