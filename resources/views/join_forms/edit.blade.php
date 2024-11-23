<x-layout>
    <div class="container">
        <h1>Edit Join Form for {{ $club->name }}</h1>



        <form action="{{ route('join-form.update', $club) }}" method="POST">
            @csrf
            @method('PUT')



            <div class="form-group">
                <label for="title">Form Title:</label>
                <input type="text" name="title" id="title"
                    class="form-control"value="{{ old('title', $joinForm->title) }}" required>
                @error('title')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <br>


            <div class="form-group">
                <label for="question">Question:</label>
                <textarea name="question" id="question" class="form-control" required>{{ old('question', $joinForm->question) }}</textarea>
                @error('question')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Update Join Form</button>
        </form>

    </div>


</x-layout>
